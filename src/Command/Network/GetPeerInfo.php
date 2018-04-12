<?php

namespace ZenCash\Rpc\Command\Network;

use ZenCash\Rpc\Command;

final class GetPeerInfo implements Command
{
    private const METHOD = 'getpeerinfo';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
