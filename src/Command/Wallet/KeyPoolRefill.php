<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class KeyPoolRefill implements Command
{
    private const METHOD = 'keypoolrefill';
    private $newSize;

    public function __construct(int $newSize = 100)
    {
        $this->newSize = $newSize;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->newSize ]
        ];
    }
}
