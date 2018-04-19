<?php

namespace ZenCash\Rpc\Command\RawTransactions\SignRawTransaction;

use MyCLabs\Enum\Enum;

/**
 * @method static SigHashType ALL()
 * @method static SigHashType NONE()
 * @method static SigHashType SINGLE()
 * @method static SigHashType ALL_ANYONECANPAY()
 * @method static SigHashType NONE_ANYONECANPAY()
 * @method static SigHashType SINGLE_ANYONECANPAY()
 */
final class SigHashType extends Enum
{
    private const ALL = 'ALL';
    private const NONE = 'NONE';
    private const SINGLE = 'SINGLE';
    private const ALL_ANYONECANPAY = 'ALL|ANYONECANPAY';
    private const NONE_ANYONECANPAY = 'NONE|ANYONECANPAY';
    private const SINGLE_ANYONECANPAY = 'SINGLE|ANYONECANPAY';
}
