<?php

namespace ZenCash\Rpc\Native;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ZenCash\Rpc\Command\Wallet\GetNewAddress;
use ZenCash\Rpc\Rpc;

class ClientTest extends TestCase
{
    /** @var \ZenCash\Rpc\Client */
    private $client;

    public function setUp()
    {
        $this->client = new Client(
            new Rpc('localhost', 'testuser', 'testpassword'),
            new \GuzzleHttp\Client(
                ['handler' => HandlerStack::create(
                    new MockHandler([
                        new Response(200),
                        new Response(401),
                        new Response(403),
                        new Response(404),
                        new Response(500),
                        new Response(502),
                        new Response(503)
                    ])
                )]
            )
        );
    }

    public function test_http_client_runs_as_expected()
    {
        $this->assertEquals(200, $this->client->execute(new GetNewAddress)->getStatusCode());

        $this->expectException(ClientException::class);
        $this->expectExceptionCode(401);
        $this->client->execute(new GetNewAddress);

        $this->expectException(ClientException::class);
        $this->expectExceptionCode(403);
        $this->client->execute(new GetNewAddress);

        $this->expectException(ClientException::class);
        $this->expectExceptionCode(404);
        $this->client->execute(new GetNewAddress);

        $this->expectException(ServerException::class);
        $this->expectExceptionCode(500);
        $this->client->execute(new GetNewAddress);

        $this->expectException(ServerException::class);
        $this->expectExceptionCode(502);
        $this->client->execute(new GetNewAddress);

        $this->expectException(ServerException::class);
        $this->expectExceptionCode(503);
        $this->client->execute(new GetNewAddress);
    }
}
