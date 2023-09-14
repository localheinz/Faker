<?php

namespace Faker\Provider\ka_GE;

/**
 * @deprecated
 */
class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+995 ### ## ## ##',
        '### ## ## ##',
        '#########',
        '(###) ## ## ##',
        '+995(##)#######',
    ];
}
