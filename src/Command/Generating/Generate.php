<?php

namespace ZenCash\Rpc\Command\Generating;

use ZenCash\Rpc\Command;

final class Generate implements Command
{
    private const METHOD = 'generate';
    private $blocks;

    public function __construct(int $numBlocks)
    {
        $this->blocks = $numBlocks;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->blocks ]
        ];
    }
}
