<?php

namespace ZenCash\Rpc\Command\Mining;

use ZenCash\Rpc\Command;

final class PrioritiseTransaction implements Command
{
    private const METHOD = 'prioritisetransaction';
    private $txid;
    private $priority;
    private $fee;

    public function __construct(string $txid, float $priority, int $fee)
    {
        $this->txid = $txid;
        $this->priority = $priority;
        $this->fee = $fee;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [$this->txid, $this->priority, $this->fee]
        ];
    }
}
