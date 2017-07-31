<?php

namespace App\Events\User;


use App\Models\User;

class Activate
{
    private $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getName()
    {
        return $this->user->name;
    }
}