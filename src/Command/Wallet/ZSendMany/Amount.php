<?php

namespace ZenCash\Rpc\Command\Wallet\ZSendMany;

final class Amount implements \JsonSerializable
{
    private $address;
    private $amount;
    private $memo;

    public function __construct(string $address, float $amount, ?string $memo)
    {
        $this->address = $address;
        $this->amount = $amount;
        $this->memo = $memo;
    }

    public function jsonSerialize(): object
    {
        return (object) array_merge([
            'address' => $this->address,
            'amount' => $this->amount
        ], !is_null($this->memo) ? [ 'memo' => $this->memo ] : [ ]);
    }
}
