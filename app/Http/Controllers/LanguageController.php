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
        $this->reposTotalNumber=0;
        $this->repos=[];
        $this->name=$name;
    }

    public function increaseReposNumber() {
        $this->reposTotalNumber++;
    }


}
