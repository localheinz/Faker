<?php

namespace Faker\Provider\sk_SK;

/**
 * @deprecated
 */
class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+421 ### ### ###',
        '00421 ### ### ###',
        '#### ### ###',
        '00421#########',
        '+421#########',
        '########',
    ];
}
