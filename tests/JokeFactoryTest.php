<?php

namespace Ejdelmonico\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use Ejdelmonico\ChuckNorrisJokes\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{
                "type": "success",
                "value": {
                    "id": 107,
                    "joke": "Chuck Norris doesn\'t bowl strikes, he just knocks down one pin and the other nine faint.",
                    "categories": [ ]
                }
            }'),
        ]);

        $handler = HandlerStack::create($mock);

        $client = new Client(['handler' => $handler]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame("Chuck Norris doesn't bowl strikes, he just knocks down one pin and the other nine faint.", $joke);
    }
}
