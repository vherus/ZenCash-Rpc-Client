<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;
use ZenCash\Rpc\Command\Wallet\ZImportKey\Rescan;

final class ZImportKey implements Command
{
    private const METHOD = 'z_importkey';
    private $zkey;
    private $rescan;
    private $startHeight;

    public function __construct(string $zkey, ?Rescan $rescan, int $startHeight = 0)
    {
        $this->zkey = $zkey;
        $this->rescan = $rescan ?: Rescan::WHEN_KEY_IS_NEW();
        $this->startHeight = $startHeight;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->zkey, (string) $this->rescan, $this->startHeight ]
        ];
    }
}
