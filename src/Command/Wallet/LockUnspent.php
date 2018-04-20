<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class LockUnspent implements Command
{
    private const METHOD = 'lockunspent';
    private $unlock;
    private $transactions;

    /**
     * @param bool $unlock
     * @param Transaction[] $transactions
     */
    public function __construct(bool $unlock, array $transactions)
    {
        call_user_func_array(function (Transaction ...$t) {}, $transactions);

        $this->unlock = $unlock;
        $this->transactions = $transactions;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->unlock, $this->transactions ]
        ];
    }
}
