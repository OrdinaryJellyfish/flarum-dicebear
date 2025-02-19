<?php

/*
 * This file is part of ordinaryjellyfish/flarum-dicebear.
 *
 * Copyright (c) 2025 Tristian Kelly.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace OrdinaryJellyfish\Dicebear;

use Flarum\Extend;
use Flarum\Api\Serializer\BasicUserSerializer;

return [
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__.'/locale'),
    
    (new Extend\ApiSerializer(BasicUserSerializer::class))
        ->attributes(Api\AddDicebearAvatar::class),
];
