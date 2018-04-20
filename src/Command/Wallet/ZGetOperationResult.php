<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ZGetOperationResult implements Command
{
    private const METHOD = 'z_getoperationresult';
    private $ids;

    /**
     * @param string[] $ids
     */
    public function __construct(array $ids)
    {
        call_user_func_array(function(string ...$ids) {}, $ids);

        $this->ids = $ids;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->ids ]
        ];
    }
}
