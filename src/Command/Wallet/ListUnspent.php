<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ListUnspent implements Command
{
    private const METHOD = 'listunspent';
    private $addresses;
    private $minConf;
    private $maxConf;

    /**
     * @param string[] $addresses
     * @param int $minConf
     * @param int $maxConf
     */
    public function __construct(array $addresses = [], int $minConf = 1, int $maxConf = 9999999)
    {
        call_user_func_array(function(string ...$address) {}, $addresses);

        $this->addresses = $addresses;
        $this->minConf = $minConf;
        $this->maxConf = $maxConf;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => array_merge([
                $this->minConf,
                $this->maxConf
            ], !empty($this->addresses) ? [ $this->addresses ] : [ ])
        ];
    }
}
