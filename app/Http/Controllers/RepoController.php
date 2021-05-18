<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepoController extends Controller
{
    private $url;
    private $languages;



    /**
     * Get the value of languages
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set the value of languages
     *
     * @return  self
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}
