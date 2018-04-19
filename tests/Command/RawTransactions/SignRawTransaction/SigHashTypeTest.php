<?php

namespace ZenCash\Rpc\Command\RawTransactions\SignRawTransaction;

use PHPUnit\Framework\TestCase;

class SigHashTypeTest extends TestCase
{
    public function test_ALL_is_available()
    {
        $this->assertEquals('ALL', SigHashType::ALL());
    }

    public function test_NONE_is_available()
    {
        $this->assertEquals('NONE', SigHashType::NONE());
    }

    public function test_SINGLE_is_available()
    {
        $this->assertEquals('SINGLE', SigHashType::SINGLE());
    }

    public function test_ALL_ANYONECANPAY_is_available()
    {
        $this->assertEquals('ALL|ANYONECANPAY', SigHashType::ALL_ANYONECANPAY());
    }

    public function test_NONE_ANYONECANPAY_is_available()
    {
        $this->assertEquals('NONE|ANYONECANPAY', SigHashType::NONE_ANYONECANPAY());
    }

    public function test_SINGLE_ANYONECANPAY_is_available()
    {
        $this->assertEquals('SINGLE|ANYONECANPAY', SigHashType::SINGLE_ANYONECANPAY());
    }
}
