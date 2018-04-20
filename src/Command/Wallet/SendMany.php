<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class SendMany implements Command
{
    private const METHOD = 'sendmany';
    private $account = '';
    private $amounts;
    private $minConfig;
    private $comment;
    private $subtractFromAddresses;

    /**
     * SendMany constructor
     * @param Amount[] $amounts
     * @param int $minConfig
     * @param string $comment
     * @param string[] $subtractFromAddresses
     */
    public function __construct(array $amounts, int $minConfig = 1, string $comment = '', array $subtractFromAddresses = [])
    {
        call_user_func_array(function(Amount ...$amounts) {}, $amounts);
        call_user_func_array(function(string ...$addresses) {}, $subtractFromAddresses);

        $this->amounts = $amounts;
        $this->minConfig = $minConfig;
        $this->comment = $comment;
        $this->subtractFromAddresses = $subtractFromAddresses;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [
                $this->account,
                $this->amounts,
                $this->minConfig,
                $this->comment,
                $this->subtractFromAddresses
            ]
        ];
    }
}
