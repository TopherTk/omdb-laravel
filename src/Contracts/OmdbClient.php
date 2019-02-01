<?php

namespace TopherTk\OmdbLaravel\Contracts;

interface OmdbClient
{
    const API_BASE_ENDPOINT = "http://www.omdbapi.com/?apikey=";

    public function getMediaInformation();
}