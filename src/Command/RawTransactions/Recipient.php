<?php

namespace ZenCash\Rpc\Command\RawTransactions;

final class Recipient implements \JsonSerializable
{
    private $address;
    private $amount;

    public function __construct(string $address, float $amount)
    {
        $this->address = $address;
        $this->amount = $amount;
    }
    
    public function jsonSerialize(): object
    {
        return (object) [
            $this->address => $this->amount
        ];
    }
}
