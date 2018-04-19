<?php

namespace ZenCash\Rpc\Command\Network;

use ZenCash\Rpc\Command;

final class DisconnectNode implements Command
{
    private const METHOD = 'disconnectnode';
    private $node;

    public function __construct(string $node)
    {
        $this->node = $node;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->node ]
        ];
    }
}
