<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class SignMessage implements Command
{
    private const METHOD = 'signmessage';
    private $address;
    private $message;

    public function __construct(string $address, string $message)
    {
        $this->address = $address;
        $this->message = $message;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->address, $this->message ]
        ];
    }
}
