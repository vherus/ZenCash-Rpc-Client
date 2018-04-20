<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class GetBalance implements Command
{
    private const METHOD = 'getbalance';
    private $account = '*';
    private $minConf;
    private $includeWatchOnly;

    public function __construct(int $minConf = 1, bool $includeWatchOnly = false)
    {
        $this->minConf = $minConf;
        $this->includeWatchOnly = $includeWatchOnly;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->account, $this->minConf, $this->includeWatchOnly ]
        ];
    }
}
