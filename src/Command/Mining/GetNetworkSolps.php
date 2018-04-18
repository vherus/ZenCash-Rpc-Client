<?php

namespace ZenCash\Rpc\Command\Mining;

use ZenCash\Rpc\Command;

final class GetNetworkSolps implements Command
{
    private const METHOD = 'getnetworksolps';
    private $blocks;
    private $height;

    public function __construct(int $blocks = 120, int $height = -1)
    {
        $this->blocks = $blocks;
        $this->height = $height;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->blocks, $this->height ]
        ];
    }
}
