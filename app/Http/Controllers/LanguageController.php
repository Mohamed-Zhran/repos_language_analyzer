<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller {
    private $repos;
    private $name;

    public function __construct($name) {
        $this->repos = [];
        $this->name = $name;
    }

    public function pushRepoUrlToLanguage($repoUrl) {
        $this->repos[] = $repoUrl;
    }

    /**
     * Get the value of name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get the value of repos
     */
    public function getRepos() {
        return $this->repos;
    }

    public function getReposCount() {
        return count($this->repos);
    }

}
