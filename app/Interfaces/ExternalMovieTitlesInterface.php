<?php

namespace App\Interfaces;

use App\Builders\Movies\Titles;

interface ExternalMovieTitlesInterface
{
    public function getBarTitles(): void;
    public function getBazTitles(): void;
    public function getFooTitles(): void;
    public function makeAllTitles(): Titles;
}
