<?php

namespace App\Builders\Movies;

class TitlesOperator
{
    /**
     * @throws \External\Bar\Exceptions\ServiceUnavailableException
     * @throws \External\Baz\Exceptions\ServiceUnavailableException
     * @throws \External\Foo\Exceptions\ServiceUnavailableException
     */
    public function make(TitlesBuilder $titlesBuilder): Titles
    {
        $titlesBuilder->getBarTitles();
        $titlesBuilder->getBazTitles();
        $titlesBuilder->getFooTitles();
        return $titlesBuilder->makeAllTitles();
    }
}
