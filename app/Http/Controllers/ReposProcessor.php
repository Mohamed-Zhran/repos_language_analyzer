<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReposProcessor extends Controller
{
    private $apiUrl;
    private $allLanguages;
    private $dateSinceAMonth;
    public function __construct()
    {
        $this->allLanguages=[];
        $this->dateSinceAMonth = date('Y-m-d', strtotime('-30 days'));
        $this->apiUrl = "https://api.github.com/search/repositories?q=created:%3E$this->dateSinceAMonth&sort=stars&order=desc&per_page=100";
    }
    
}
