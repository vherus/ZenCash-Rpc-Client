<?php

namespace ZenCash\Rpc\Command\Network;

use ZenCash\Rpc\Command;

final class Ping implements Command
{
    private const METHOD = 'ping';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
