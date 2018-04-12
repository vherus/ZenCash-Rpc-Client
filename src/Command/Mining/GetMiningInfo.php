<?php

namespace ZenCash\Rpc\Command\Mining;

use ZenCash\Rpc\Command;

final class GetMiningInfo implements Command
{
    private const METHOD = 'getmininginfo';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
