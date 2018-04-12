<?php

namespace ZenCash\Rpc\Command\Control;

use ZenCash\Rpc\Command;

final class GetInfo implements Command
{
    private const METHOD = 'getinfo';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
