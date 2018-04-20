<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ZExportKey implements Command
{
    private const METHOD = 'z_exportkey';
    private $address;

    public function __construct(string $address)
    {
        $this->address = $address;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->address ]
        ];
    }
}
