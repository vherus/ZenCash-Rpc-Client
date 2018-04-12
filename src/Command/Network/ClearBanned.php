<?php

namespace ZenCash\Rpc\Command\Network;

use ZenCash\Rpc\Command;

final class ClearBanned implements Command
{
    private const METHOD = 'clearbanned';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
