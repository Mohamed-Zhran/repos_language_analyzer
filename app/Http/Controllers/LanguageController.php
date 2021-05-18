<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    private $reposTotalNumber;
    private $repos;
    private $name;

    public function __construct($name)
    {
        $this->reposTotalNumber = 0;
        $this->repos = [];
        $this->name = $name;
    }

    public function increaseReposNumber()
    {
        $this->reposTotalNumber++;
    }

    public function pushRepoUrlToLanguage($repoUrl)
    {
        $this->repos[] = $repoUrl;
    }

    /**
     * Get the value of reposTotalNumber
     */
    public function getReposTotalNumber()
    {
        return $this->reposTotalNumber;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of repos
     */
    public function getRepos()
    {
        return $this->repos;
    }
}
