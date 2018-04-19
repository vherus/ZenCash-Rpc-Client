<?php

namespace ZenCash\Rpc\Command\Network\SetBan;

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
}
