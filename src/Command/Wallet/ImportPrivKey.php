<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class ImportPrivKey implements Command
{
    private const METHOD = 'importprivkey';
    private $privateKey;
    private $label;
    private $rescan;

    public function __construct(string $privateKey, string $label = '', bool $rescan = true)
    {
        $this->privateKey = $privateKey;
        $this->label = $label;
        $this->rescan = $rescan;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->privateKey, $this->label, $this->rescan ]
        ];
    }
}
