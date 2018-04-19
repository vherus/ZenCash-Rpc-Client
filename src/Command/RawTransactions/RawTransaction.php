<?php

namespace ZenCash\Rpc\Command\RawTransactions;

final class RawTransaction implements \JsonSerializable
{
    private $txid;
    private $vout;

    public function __construct(string $txid, int $vout)
    {
        $this->txid = $txid;
        $this->vout = $vout;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'txid' => $this->txid,
            'vout' => $this->vout
        ];
    }
}
