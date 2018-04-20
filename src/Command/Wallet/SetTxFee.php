<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class SetTxFee implements Command
{
    private const METHOD = 'settxfee';
    private $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->amount ]
        ];
    }
}
