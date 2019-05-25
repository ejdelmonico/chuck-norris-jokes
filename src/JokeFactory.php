<?php

namespace Ejdelmonico\ChuckNorrisJokes;

class JokeFactory
{
    protected $jokes = [
        'The First rule of Chuck Norris is: you do not talk about Chuck Norris.',
        'If you can see Chuck Norris, he can see you. If you can\' t see Chuck Norris you may be only seconds away  from death.',
        'Chuck Norris counted to infinity... Twice.',
        'When the Boogeyman goes to sleep at night he checks his closet for Chuck Norris.',
        'They once made a "Chuck Norris" brand toilet paper, but it wouldn\'t take shit from any body.'
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
