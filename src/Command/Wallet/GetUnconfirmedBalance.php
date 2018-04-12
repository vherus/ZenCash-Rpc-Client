<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class GetUnconfirmedBalance implements Command
{
    private const METHOD = 'getunconfirmedbalance';

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ];
    }
}
