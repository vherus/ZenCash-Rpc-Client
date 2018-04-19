<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use ZenCash\Rpc\Command;

final class SendRawTransaction implements Command
{
    private const METHOD = 'sendrawtransaction';
    private $hex;
    private $allowHighFees;

    public function __construct(string $hex, bool $allowHighFees = false)
    {
        $this->hex = $hex;
        $this->allowHighFees = $allowHighFees;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->hex, $this->allowHighFees ]
        ];
    }
}
