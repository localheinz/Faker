<?php

namespace Faker\Provider\bn_BD;

/**
 * @deprecated
 */
class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    public function phoneNumber()
    {
        $number = '+880';
        $number .= static::randomNumber(7);

        return Utils::getBanglaNumber($number);
    }
}
