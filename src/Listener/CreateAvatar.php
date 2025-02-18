<?php

namespace OrdinaryJellyfish\Dicebear\Listener;

use Flarum\User\Event\Registered;
use Flarum\Settings\SettingsRepositoryInterface;

class CreateAvatar
{
    private SettingsRepositoryInterface $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function handle(Registered $event)
    {
        
        $user = $event->user;
        $user->avatar_url = $this->settings->get('ordinaryjellyfish-dicebear.api_url').'/9.x/'.$this->settings->get('ordinaryjellyfish-dicebear.avatar_style').'/png?seed='.$user->username;
        $user->save();
    }
}
