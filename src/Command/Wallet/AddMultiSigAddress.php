<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class AddMultiSigAddress implements Command
{
    private const METHOD = 'addmultisigaddress';
    private $nRequired;
    private $keys;

    /**
     * @param int $nRequired
     * @param string[] $keys
     */
    public function __construct(int $nRequired, array $keys)
    {
        call_user_func_array(function(string $key) {}, $keys);

        $this->nRequired = $nRequired;
        $this->keys = $keys;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->nRequired, $this->keys ]
        ];
    }
}
