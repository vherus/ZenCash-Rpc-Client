<?php

namespace ZenCash\Rpc\Command\Network;

use ZenCash\Rpc\Command;
use ZenCash\Rpc\Command\Network\SetBan\Command as CommandEnum;

final class SetBan implements Command
{
    private const METHOD = 'setban';
    private $ip;
    private $command;
    private $banTime;
    private $absolute;


    public function __construct(string $ip, CommandEnum $command, ?int $banTime, ?bool $absolute)
    {
        $this->ip = $ip;
        $this->command = $command;
        $this->banTime = $banTime;
        $this->absolute = $absolute;
    }

    public function jsonSerialize(): object
    {
        return (object) [
            'jsonrpc' => Command::JSON_RPC_VERSION,
            'id'      => Command::ID,
            'method'  => self::METHOD,
            'params' => array_merge(
                [ $this->ip, (string) $this->command],
                !is_null($this->banTime) ? [ $this->banTime ] : [ ],
                !is_null($this->absolute) && !is_null($this->banTime) ? [ $this->absolute ] : [ ]
            )
        ];
    }
}
