<?php

namespace App\Builders\Movies;

use App\Interfaces\ExternalMovieTitlesInterface;

class TitlesBuilder implements ExternalMovieTitlesInterface
{
    private Titles $allTitles;

    public function __construct()
    {
        $this->allTitles = new Titles();
    }

    /**
     * @throws \External\Bar\Exceptions\ServiceUnavailableException
     */
    public function getBarTitles(): void
    {
        $titles = (new \External\Bar\Movies\MovieService())->getTitles();
        $groupTitles = [];
        foreach ($titles['titles'] as $title) {
            $groupTitles[] = $title['title'];
        }
        $this->allTitles->addTitles($groupTitles);
    }

    /**
     * @throws \External\Baz\Exceptions\ServiceUnavailableException
     */
    public function getBazTitles(): void
    {
        $titles = (new \External\Baz\Movies\MovieService())->getTitles();
        $this->allTitles->addTitles($titles['titles']);
    }

    /**
     * @throws \External\Foo\Exceptions\ServiceUnavailableException
     */
    public function getFooTitles(): void
    {
        $titles = (new \External\Foo\Movies\MovieService())->getTitles();
        $this->allTitles->addTitles($titles);
    }

    /**
     * @return Titles
     */
    public function makeAllTitles(): Titles
    {
        return $this->allTitles;
    }
}
