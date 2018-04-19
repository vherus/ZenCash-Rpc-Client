<?php

namespace ZenCash\Rpc\Command\Util;

use ZenCash\Rpc\Command;

final class EstimatePriority implements Command
{
    private const METHOD = 'estimatepriority';
    private $nBlocks;

    public function __construct(int $nBlocks)
    {
        $this->nBlocks = $nBlocks;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->nBlocks ]
        ];
    }
}
