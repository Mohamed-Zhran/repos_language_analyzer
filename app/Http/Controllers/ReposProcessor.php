<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\LanguageController;

class ReposProcessor extends Controller {
    private $apiUrl;
    private $languages;
    private $reposLanguagesUrls;
    private $dateSinceMonth;

    public function __construct() {
        $this->languages = [];
        $this->reposLanguagesUrls = [];
        $this->dateSinceMonth = date('Y-m-d', strtotime('-30 days'));
        $this->apiUrl = "https://api.github.com/search/repositories?q=created:%3E$this->dateSinceMonth&sort=stars&order=desc&per_page=5";
    }

    public function start() {
        $this->storeLanguagesUrls($this->getReposFromApi());
        $this->storeLanguages();
    }

    private function storeLanguagesUrls($repos) {
        foreach ($repos as $repo) {
            $this->reposLanguagesUrls[$repo['html_url']] = $repo['languages_url'];
        }
    }

    private function getReposFromApi() {
        $response = Http::get($this->apiUrl);
        if ($response->ok()) {
            return $response->json('items');
        }
    }

    private function storeLanguages() {
        foreach ($this->reposLanguagesUrls as $repoUrl => $languageUrl) {
            foreach ($this->getLanguageFromApi($languageUrl) as $language => $percentage) {
                $this->addLanguageIfNotExistWithRepo($language, $repoUrl);
            }
        }
    }

    private function getLanguageFromApi($languageUrl) {
        $response = Http::get($languageUrl);
        if ($response->ok()) {
            return $response->json();
        }
    }

    private function addLanguageIfNotExistWithRepo($language, $repoUrl) {
        if (!array_key_exists($language, $this->languages)) {
            $this->setAllLanguages($language);
            $this->addRepoToLanguage($language, $repoUrl);
        } else {
            $this->addRepoToLanguage($language, $repoUrl);
        }
    }

    private function setAllLanguages($language) {
        $this->languages[$language] = new LanguageController($language);
    }

    private function addRepoToLanguage($language, $repoUrl) {
        $this->languages[$language]->pushRepoUrlToLanguage($repoUrl);
    }
}
