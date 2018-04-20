<?php

namespace ZenCash\Rpc\Command\Wallet;

use ZenCash\Rpc\Command;

final class SendToAddress implements Command
{
    private const METHOD = 'sendtoaddress';
    private $address;
    private $amount;
    private $comment;
    private $commentTo;
    private $subtractFromAmount;

    public function __construct(
        string $address,
        float $amount,
        ?string $comment,
        ?string $commentTo,
        bool $subtractFromAmount = false
    ) {
        $this->address = $address;
        $this->amount = $amount;
        $this->comment = $comment;
        $this->commentTo = $commentTo;
        $this->subtractFromAmount = $subtractFromAmount;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => array_merge(
                [
                    $this->address, $this->amount
                ],
                !is_null($this->comment) ? [ $this->comment ] : [ ],
                !is_null($this->comment) && !is_null($this->commentTo) ? [ $this->commentTo ] : [ ],
                $this->subtractFromAmount !== false ? [ $this->subtractFromAmount ] : [ ]
            )
        ];
    }
}
