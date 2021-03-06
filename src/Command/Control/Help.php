<?php

namespace ZenCash\Rpc\Command\Control;

use ZenCash\Rpc\Command;

final class Help implements Command
{
    private const METHOD = 'help';
    private $command;

    public function __construct(?string $command)
    {
        $this->command = $command;
    }

    public function jsonSerialize(): object
    {
        return (object) array_merge([
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD
        ], !is_null($this->command) ? [
            'params' => [ $this->command ]
        ] : [ ]);
    }
}
