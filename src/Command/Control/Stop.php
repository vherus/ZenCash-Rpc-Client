<?php

namespace ZenCash\Rpc\Command\Control;

use ZenCash\Rpc\Command;

final class Stop implements Command
{
    private const METHOD = 'stop';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
