<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

class ListSinceBlock implements Command
{
    private const METHOD = 'listsinceblock';
    private $hash;
    private $confirms;
    private $watchOnly;

    public function __construct(?string $blockHash, ?int $targetConfirmations, ?bool $includeWatchOnly)
    {
        $this->hash = $blockHash;
        $this->confirms = $targetConfirmations;
        $this->watchOnly = $includeWatchOnly;
    }

    public function jsonSerialize(): object
    {
        return (object) [
                'jsonrpc' => Command::JSON_RPC_VERSION,
                'id'      => Command::ID,
                'method'  => self::METHOD,
                'params' => array_merge(
                    !is_null($this->hash) ? [ $this->hash ] : [ ],
                    !is_null($this->hash) && !is_null($this->confirms) ? [ $this->confirms ] : [ ],
                    !is_null($this->hash) && !is_null($this->confirms) && !is_null($this->watchOnly) ? [
                        $this->watchOnly
                    ] : [ ]
                )
        ];
    }
}
