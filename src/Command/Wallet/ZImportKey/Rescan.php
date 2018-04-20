<?php

namespace ZenCash\Rpc\Command\Wallet\ZImportKey;

use MyCLabs\Enum\Enum;

/**
 * @method static Rescan YES()
 * @method static Rescan NO()
 * @method static Rescan WHEN_KEY_IS_NEW()
 */
final class Rescan extends Enum
{
    private const YES = 'yes';
    private const NO = 'no';
    private const WHEN_KEY_IS_NEW = 'whenkeyisnew';
}
