<?php

namespace App\Builders\Movies;

class Titles
{
    /**
     * @var array
     */
    private array $allTitles = [];

    /**
     * @param $titles
     */
    public function addTitles($titles): void
    {
        $this->allTitles = array_merge($this->allTitles, $titles);
    }

    /**
     * @return array
     */
    public function getAllTitles(): array
    {
        return $this->allTitles;
    }
}
