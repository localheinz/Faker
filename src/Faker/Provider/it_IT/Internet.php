<?php

namespace Faker\Provider\it_IT;

/**
 * @deprecated
 */
class Internet extends \Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'email.it', 'libero.it', 'yahoo.it'];
    protected static $tld = ['com', 'com', 'com', 'net', 'org', 'it', 'it', 'it'];
}
