<?php

namespace ZenCash\Rpc\Command\Util;

use ZenCash\Rpc\Command;

final class VerifyMessage implements Command
{
    private const METHOD = 'verifymessage';
    private $address;
    private $signature;
    private $message;

    public function __construct(string $address, string $signature, string $message)
    {
        $this->address = $address;
        $this->signature = $signature;
        $this->message = $message;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->address, $this->signature, $this->message ]
        ];
    }
}
