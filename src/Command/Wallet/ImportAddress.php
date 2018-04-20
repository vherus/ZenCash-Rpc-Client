<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ImportAddress implements Command
{
    private const METHOD = 'importaddress';
    private $address;
    private $label;
    private $rescan;

    public function __construct(string $address, string $label = '', bool $rescan = true)
    {
        $this->address = $address;
        $this->label = $label;
        $this->rescan = $rescan;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->address, $this->label, $this->rescan ]
        ];
    }
}
