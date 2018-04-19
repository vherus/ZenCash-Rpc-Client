<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use ZenCash\Rpc\Command;

final class GetRawTransaction implements Command
{
    private const METHOD = 'getrawtransaction';
    private $txid;
    private $verbose;

    public function __construct(string $txid, int $verbose = 0)
    {
        $this->txid = $txid;
        $this->verbose = $verbose;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->txid, $this->verbose ]
        ];
    }
}
