<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ZGetTotalBalance implements Command
{
    private const METHOD = 'z_gettotalbalance';
    private $minConf;

    public function __construct(int $minConf = 1)
    {
        $this->minConf = $minConf;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->minConf ]
        ];
    }
}
