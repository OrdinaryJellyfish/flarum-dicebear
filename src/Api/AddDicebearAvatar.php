<?php

/*
 * This file is part of ordinaryjellyfish/flarum-dicebear.
 *
 * Copyright (c) 2025 Tristian Kelly.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace OrdinaryJellyfish\Dicebear\Api;

use Flarum\Api\Serializer\BasicUserSerializer;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\User;

class AddDicebearAvatar
{
    public SettingsRepositoryInterface $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function __invoke(BasicUserSerializer $serializer, User $user, array $attributes)
    {
        if (empty($attributes['avatarUrl'])) {
            $attributes['avatarUrl'] = $this->settings->get('ordinaryjellyfish-dicebear.api_url').'/9.x/'.$this->settings->get('ordinaryjellyfish-dicebear.avatar_style').'/png?seed='.$user->username;
        }

        return $attributes;
    }
}
