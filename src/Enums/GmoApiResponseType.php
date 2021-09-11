<?php

namespace Prum\LaravelGmoPaymentApi\Enums;

use BenSampo\Enum\Enum;

/**
 * Class GmoApiResponseType
 * @package Prum\LaravelGmoPaymentApi\Enums
 */
final class GmoApiResponseType extends Enum
{
    /**
     * FORM
     */
    public const TYPE_AS_FORM = 1;

    /**
     * JSON
     */
    public const TYPE_AS_JSON = 2;

    /**
     * @param integer $value
     * @return mixed
     */
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::TYPE_AS_FORM:
                return 'idPass';
            case self::TYPE_AS_JSON:
                return 'json';
        }
        return 'idPass';
    }
}
