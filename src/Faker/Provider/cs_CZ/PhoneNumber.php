<?php

namespace Faker\Provider\cs_CZ;

/**
 * @deprecated
 */
class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+420 %## ### ###',
        '%## ### ###',
        '00420%########',
        '+420%########',
        '%########',
    ];
}
