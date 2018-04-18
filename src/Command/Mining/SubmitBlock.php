<?php

namespace ZenCash\Rpc\Command\Mining;

use ZenCash\Rpc\Command;

final class SubmitBlock implements Command
{
    private const METHOD = 'submitblock';
    private $hexData;

    public function __construct(string $hexData)
    {
        $this->hexData = $hexData;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->hexData ]
        ];
    }
}
