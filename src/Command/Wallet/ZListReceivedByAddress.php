<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ZListReceivedByAddress implements Command
{
    private const METHOD = 'z_listreceivedbyaddress';
    private $address;
    private $minConf;

    public function __construct(string $address, int $minConf = 1)
    {
        $this->address = $address;
        $this->minConf = $minConf;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->address, $this->minConf ]
        ];
    }
}
