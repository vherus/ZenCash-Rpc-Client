<?php

namespace ZenCash\Rpc\Command\RawTransactions;

use ZenCash\Rpc\Command;

final class CreateRawTransaction implements Command
{
    private const METHOD = 'createrawtransaction';
    private $transactions;
    private $recipients;

    /**
     * @param RawTransaction[] $transactions
     * @param Recipient[] $recipients
     */
    public function __construct(array $transactions, array $recipients)
    {
        foreach ($transactions as $t) {
            if (!$t instanceof RawTransaction) {
                throw new \InvalidArgumentException("Invalid type within RawTransaction array: " . gettype($t));
            }
        }

        foreach ($recipients as $r) {
            if (!$r instanceof Recipient) {
                throw new \InvalidArgumentException("Invalid type within Recipient array: " . gettype($r));
            }
        }

        $this->transactions = $transactions;
        $this->recipients = $recipients;
    }

    public function jsonSerialize(): object
    {
        $addresses = [];

        foreach ($this->recipients as $recipient) {
            $addresses = array_merge($addresses, (array) $recipient->jsonSerialize());
        }

        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => [ $this->transactions, (object) $addresses ]
        ];
    }
}
