<?php

namespace Ejdelmonico\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use Ejdelmonico\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory(['This is a joke']);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $chuckNorrisJokes = [
            'The First rule of Chuck Norris is: you do not talk about Chuck Norris.',
            'If you can see Chuck Norris, he can see you. If you can\' t see Chuck Norris you may be only seconds away  from death.',
            'Chuck Norris counted to infinity... Twice.',
            'When the Boogeyman goes to sleep at night he checks his closet for Chuck Norris.',
            'They once made a "Chuck Norris" brand toilet paper, but it wouldn\'t take shit from any body.'
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $chuckNorrisJokes);
    }
}
