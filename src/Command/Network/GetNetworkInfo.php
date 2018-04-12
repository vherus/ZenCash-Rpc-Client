<?php

namespace ZenCash\Rpc\Command\Network;

use ZenCash\Rpc\Command;

final class GetNetworkInfo implements Command
{
    private const METHOD = 'getnetworkinfo';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
