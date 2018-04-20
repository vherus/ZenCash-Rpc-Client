<?php

namespace ZenCash\Rpc\Command\Wallet\ZImportKey;

use PHPUnit\Framework\TestCase;

class RescanTest extends TestCase
{
    public function test_yes_is_available()
    {
        $this->assertEquals('yes', Rescan::YES());
    }

    public function test_no_is_available()
    {
        $this->assertEquals('no', Rescan::NO());
    }

    public function test_whenkeyisnew_is_available()
    {
        $this->assertEquals('whenkeyisnew', Rescan::WHEN_KEY_IS_NEW());
    }
}
