<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ListReceivedByAddress implements Command
{
    private const METHOD = 'listreceivedbyaddress';
    private $minConf;
    private $includeEmpty;
    private $includeWatchOnly;

    public function __construct(int $minConf = 1, bool $includeEmpty = false, bool $includeWatchOnly = false)
    {
        $this->minConf = $minConf;
        $this->includeEmpty = $includeEmpty;
        $this->includeWatchOnly = $includeWatchOnly;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->minConf, $this->includeEmpty, $this->includeWatchOnly ]
        ];
    }
}
