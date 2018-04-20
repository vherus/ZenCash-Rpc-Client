<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class DumpWallet implements Command
{
    private const METHOD = 'dumpwallet';
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->filename ]
        ];
    }
}
