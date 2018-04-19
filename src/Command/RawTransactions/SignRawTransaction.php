<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use ZenCash\Rpc\Command;
use ZenCash\Rpc\Command\RawTransactions\SignRawTransaction\SigHashType;

final class SignRawTransaction implements Command
{
    private const METHOD = 'signrawtransaction';
    private $hex;
    private $prevtxs;
    private $privateKeys;
    private $sigHashType;

    /**
     * @param string $hex
     * @param RawTransaction[] $prevtxs
     * @param string[] $privateKeys
     * @param null|SigHashType $sigHashType
     */
    public function __construct(string $hex, array $prevtxs, array $privateKeys, ?SigHashType $sigHashType)
    {
        call_user_func_array(function (RawTransaction ...$t) {}, $prevtxs);
        call_user_func_array(function (string ...$keys) {}, $privateKeys);

        $this->hex = $hex;
        $this->prevtxs = $prevtxs;
        $this->privateKeys = $privateKeys;
        $this->sigHashType = $sigHashType ?: SigHashType::ALL();
    }

    public function jsonSerialize(): object
    {
        foreach ($this->prevtxs as $t) {
            if (!property_exists($t, 'scriptPubKey') || !property_exists($t, 'redeemScript')) {
                throw new \InvalidArgumentException("RawTransaction missing required data.");
            }
        }

        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => array_merge(
                [ $this->hex ],
                $this->getPrevtxsParam(),
                $this->getPrivateKeysParam(),
                $this->getSigHashTypeParam()
            )
        ];
    }

    private function getPrevtxsParam(): array
    {
        return !empty($this->prevtxs) ? [ $this->prevtxs ] : [ ];
    }

    private function getPrivateKeysParam(): array
    {
        return !empty($this->prevtxs) && !empty($this->privateKeys) ? [ $this->privateKeys ] : [ ];
    }

    private function getSigHashTypeParam(): array
    {
        return (!empty($this->prevtxs) && !empty($this->privateKeys)) ? [ $this->sigHashType ] : [ ];
    }
}
