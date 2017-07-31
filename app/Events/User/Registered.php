<?php

namespace App\Events\User;

use App\Models\Profile;
use App\Models\Tokens;
use App\Models\User;
use Carbon\Carbon;

class Registered
{
    private $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserName()
    {
        return $this->user->name;
    }

    public function handleUserRegistration()
    {
        $this->makeUserProfile();
        $this->generateActivationToken();
    }

    public function makeUserProfile()
    {
        Profile::create([
            'user_id' => $this->user->id,
            'options' => ['sidebar' => true],
        ]);
    }

    public function generateActivationToken()
    {
        Tokens::create([
            'user_id' => $this->user->id,
            'type' => 'user_activation',
            'token' => uniqid(),
            'created_at' => Carbon::now(),
            'expiry_at' => Carbon::now(),
        ]);
    }
}