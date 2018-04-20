<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;
use ZenCash\Rpc\Command\Wallet\ZSendMany\Amount;

final class ZSendMany implements Command
{
    private const METHOD = 'z_sendmany';
    private $fromAddress;
    private $amounts;
    private $minConf;
    private $fee;

    /**
     * @param string $fromAddress
     * @param Amount[] $amounts
     * @param int $minConfig
     * @param float $fee
     */
    public function __construct(string $fromAddress, array $amounts, int $minConf = 1, float $fee = 0.0001)
    {
        call_user_func_array(function(Amount ...$amounts) {}, $amounts);

        $this->fromAddress = $fromAddress;
        $this->amounts = $amounts;
        $this->minConf = $minConf;
        $this->fee = $fee;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [
                $this->fromAddress,
                $this->amounts,
                $this->minConf,
                $this->fee
            ]
        ];
    }
}
