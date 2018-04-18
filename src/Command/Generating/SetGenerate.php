<?php

namespace ZenCash\Rpc\Command\Generating;

use ZenCash\Rpc\Command;

final class SetGenerate implements Command
{
    private const METHOD = 'setgenerate';
    private $generate;
    private $limit;

    public function __construct(bool $generate, ?int $genProcLimit)
    {
        $this->generate = $generate;
        $this->limit = $genProcLimit;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => array_merge([$this->generate], !is_null($this->limit) ? [$this->limit] : [])
        ];
    }
}
