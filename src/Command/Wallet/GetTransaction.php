<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class GetTransaction implements Command
{
    private const METHOD = 'gettransaction';
    private $txid;
    private $includeWatchOnly;

    public function __construct(string $txid, bool $includeWatchOnly = false)
    {
        $this->txid = $txid;
        $this->includeWatchOnly = $includeWatchOnly;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->txid, $this->includeWatchOnly ]
        ];
    }
}
