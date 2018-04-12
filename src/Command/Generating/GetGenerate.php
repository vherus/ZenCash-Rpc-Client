<?php

namespace ZenCash\Rpc\Command\Generating;

use ZenCash\Rpc\Command;

final class GetGenerate implements Command
{
    private const METHOD = 'getgenerate';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
