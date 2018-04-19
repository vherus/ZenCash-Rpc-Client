<?php

namespace ZenCash\Rpc\Command\Network;

use ZenCash\Rpc\Command;
use ZenCash\Rpc\Command\Network\AddNode\Command as CommandEnum;

final class AddNode implements Command
{
    private const METHOD = 'addnode';
    private $node;
    private $command;

    public function __construct(string $node, CommandEnum $command)
    {
        $this->node = $node;
        $this->command = $command;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->node, (string) $this->command ]
        ];
    }
}
