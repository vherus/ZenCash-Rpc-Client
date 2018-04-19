<?php

namespace ZenCash\Rpc\Command\Util;

use ZenCash\Rpc\Command;

final class CreateMultiSig implements Command
{
    private const METHOD = 'createmultisig';
    private $nRequired;
    private $keys;

    /**
     * CreateMultiSig constructor
     * @param int $nRequired
     * @param string[] $keys
     */
    public function __construct(int $nRequired, array $keys)
    {
        call_user_func_array(function(string ...$keys) {}, $keys);

        if (empty($keys)) {
            throw new \InvalidArgumentException('At least 1 key must be supplied.');
        }

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
