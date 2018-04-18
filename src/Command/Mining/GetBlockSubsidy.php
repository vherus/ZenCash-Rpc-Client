<?php

namespace ZenCash\Rpc\Command\Mining;

use ZenCash\Rpc\Command;

final class GetBlockSubsidy implements Command
{
    private const METHOD = 'getblocksubsidy';
    private $height;

    public function __construct(?int $height)
    {
        $this->height = $height;
    }

    public function jsonSerialize(): object
    {
        return (object) array_merge([
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ], !is_null($this->height) ? [
            'params' => [
                $this->height
            ]
        ] : []);
    }
}
