<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use ZenCash\Rpc\Command;

final class FundRawTransaction implements Command
{
    private const METHOD = 'fundrawtransaction';
    private $hex;

    public function __construct(string $hex)
    {
        $this->hex = $hex;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->hex ]
        ];
    }
}
