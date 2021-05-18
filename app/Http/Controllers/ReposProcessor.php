<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReposProcessor extends Controller
{
    private $apiUrl;
    private $allLanguages;
    private $allLanguagesUrls;
    private $dateSinceAMonth;

    public function __construct()
    {
        $this->allLanguages = [];
        $this->allLanguagesUrls = [];
        $this->dateSinceAMonth = date('Y-m-d', strtotime('-30 days'));
        $this->apiUrl = "https://api.github.com/search/repositories?q=created:%3E$this->dateSinceAMonth&sort=stars&order=desc&per_page=1";
    }

    public function getReposFromApi()
    {
        $response = Http::get($this->apiUrl);
        return $response->json('items');
    }
}
