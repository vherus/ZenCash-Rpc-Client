<?php

namespace ZenCash\Rpc;

use Psr\Http\Message\ResponseInterface;

interface Client
{
    public function execute(Command $command): ResponseInterface;
}
