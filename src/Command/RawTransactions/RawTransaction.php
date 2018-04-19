<?php

namespace ZenCash\Rpc\Command\RawTransactions;

final class RawTransaction implements \JsonSerializable
{
    private $txid;
    private $vout;
    private $scriptPubKey;
    private $redeemScript;

    public function __construct(string $txid, int $vout, ?string $scriptPubKey, ?string $redeemScript)
    {
        $this->txid = $txid;
        $this->vout = $vout;
        $this->scriptPubKey = $scriptPubKey;
        $this->redeemScript = $redeemScript;
    }

    public function jsonSerialize(): object
    {
        return (object) array_merge(
            [ 'txid' => $this->txid, 'vout' => $this->vout ],
            !is_null($this->scriptPubKey) ? [ 'scriptPubKey' => $this->scriptPubKey ] : [ ],
            !is_null($this->redeemScript) ? [ 'redeemScript' => $this->redeemScript ] : [ ]
        );
    }
}
