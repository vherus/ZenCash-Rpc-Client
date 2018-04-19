<?php

namespace ZenCash\Rpc\Command\Network;

use ZenCash\Rpc\Command;

final class GetAddedNodeInfo implements Command
{
    private const METHOD = 'getaddednodeinfo';
    private $dns;
    private $node;

    public function __construct(bool $dns, ?string $node)
    {
        $this->dns = $dns;
        $this->node = $node;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => array_merge([ $this->dns ], !is_null($this->node) ? [ $this->node ] : [ ])
        ];
    }
}
