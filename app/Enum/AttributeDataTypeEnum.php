<?php

namespace App\Enum;

class AttributeDataTypeEnum
{
    const FLOAT = 'float';
    const STRING = 'string';
    const INTEGER = 'integer';
    const DATE = 'date';

    public static function datatypes()
    {
        return ['float','string','integer','date'];
    }
}
