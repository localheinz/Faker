<?php

namespace Faker\Provider\hu_HU;

/**
 * @deprecated
 */
class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+36-##-###-####',
        '+36#########',
        '+36(##)###-###',
        '06-##-###-####',
        '06(##)###-###',
    ];
}
