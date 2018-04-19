<?php

namespace ZenCash\Rpc\Command\Network\AddNode;

use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    public function test_ADD_is_available()
    {
        $this->assertEquals('add', Command::ADD());
    }

    public function test_REMOVE_is_available()
    {
        $this->assertEquals('remove', Command::REMOVE());
    }

    public function test_ONE_TRY_is_available()
    {
        $this->assertEquals('onetry', Command::ONE_TRY());
    }
}
