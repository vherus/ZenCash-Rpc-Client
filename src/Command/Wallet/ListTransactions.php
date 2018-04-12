<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ListTransactions implements Command
{
    private const METHOD = 'listtransactions';
    private $account;
    private $count;
    private $from;
    private $includeWatchOnly;

    public function __construct(string $account = '*', int $count = 10, int $from = 0, bool $includeWatchOnly = false)
    {
        $this->account = $account;
        $this->count = $count;
        $this->from = $from;
        $this->includeWatchOnly = $includeWatchOnly;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => (object) [
                $this->account,
                $this->count,
                $this->from,
                $this->includeWatchOnly
            ]
        ];
    }
}
