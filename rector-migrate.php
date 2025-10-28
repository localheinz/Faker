<?php

declare(strict_types=1);

use Faker\Rector;
use Rector\Config;

return static function (Config\RectorConfig $rectorConfig): void {
    $rectorConfig->rule(Rector\GeneratorPropertyFetchToMethodCallRector::class);
};
