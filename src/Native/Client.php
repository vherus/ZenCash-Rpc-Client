<?php

namespace ZenCash\Rpc\Native;

use GuzzleHttp\ClientInterface as IHttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException as IException;
use GuzzleHttp\Exception\ServerException;
use Psr\Http\Message\ResponseInterface;
use ZenCash\Rpc\Client as IClient;
use ZenCash\Rpc\Command;
use ZenCash\Rpc\Rpc;

final class Client implements IClient
{
    private $rpc;
    private $httpClient;

    public function __construct(Rpc $rpc, IHttpClient $httpClient)
    {
        $this->rpc = $rpc;
        $this->httpClient = $httpClient;
    }

    /** @throws IException|ServerException|ClientException */
    public function execute(Command $command): ResponseInterface
    {
        return $this->httpClient->request('POST', $this->rpc->getAddress(), [
            'headers' => [
                'Content-Type' => 'text/plain'
            ],
            'auth' => [$this->rpc->getUser(), $this->rpc->getPassword()],
            'json' => $command
        ]);
    }
}
