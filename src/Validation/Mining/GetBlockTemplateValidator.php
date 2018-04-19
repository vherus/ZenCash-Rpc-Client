<?php

namespace ZenCash\Rpc\Validation\Mining;

use ZenCash\Rpc\Validation\Exception\JsonFormatException;
use ZenCash\Rpc\Validation\JsonValidator;

final class GetBlockTemplateValidator implements JsonValidator
{
    /** @throws JsonFormatException */
    public static function validate(string $json): void
    {
        if (!$decoded = json_decode($json)) {
            throw new JsonFormatException("JSON object has an invalid structure:\n$json");
        }

        self::validateMode($decoded);

        self::validateCapabilities($decoded);
    }

    /** @throws JsonFormatException */
    private static function validateMode(object $decoded): void
    {
        if (($decoded->mode ?? false) && ($decoded->mode !== 'template')) {
            throw new JsonFormatException("JSON property `mode` must be either 'template' or omitted.");
        }
    }

    /** @throws JsonFormatException */
    private static function validateCapabilities(object $decoded): void
    {
        if ($decoded->capabilities ?? false) {
            if (!is_array($decoded->capabilities)) {
                throw new JsonFormatException(
                    'JSON property `capabilities` must be of type `array`, `' .
                    gettype($decoded->capabilities) . '` provided.'
                );
            }

            array_walk($decoded->capabilities, function($item) {
                if (!is_string($item)) {
                    throw new JsonFormatException("JSON property `capabilities` must only contain strings.");
                }
            });
        }
    }
}
