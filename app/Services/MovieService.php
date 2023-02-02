<?php

namespace App\Services;

use App\Builders\Movies\TitlesOperator;
use App\Builders\Movies\TitlesBuilder;
use External\Bar\Exceptions\ServiceUnavailableException;

class MovieService
{
    /**
     * @throws \External\Bar\Exceptions\ServiceUnavailableException
     * @throws \External\Baz\Exceptions\ServiceUnavailableException
     * @throws \External\Foo\Exceptions\ServiceUnavailableException
     */
    public function getTitles(): array
    {
        $titlesBuilder = new TitlesBuilder();

        $titlesOperator = new TitlesOperator();
        $allTitles = $titlesOperator->make($titlesBuilder);

        return $allTitles->getAllTitles();
    }
}
