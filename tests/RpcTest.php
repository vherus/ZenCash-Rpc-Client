<?php

namespace ZenCash\Rpc;

use PHPUnit\Framework\TestCase;

class RpcTest extends TestCase
{
    public function test_properties_set_as_expected()
    {
        $rpc = new Rpc('localhost', 'myrpcuser', 'myrpcpassword');

        $this->assertEquals('localhost', $rpc->getAddress());
        $this->assertEquals('myrpcuser', $rpc->getUser());
        $this->assertEquals('myrpcpassword', $rpc->getPassword());
    }
}
