<?php

namespace App\Events\User;


use Spatie\Permission\Models\Role;

class RoleCreated
{
    private $role;

    /**
     * RoleCreated constructor.
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getName()
    {
        return $this->role->name;
    }
}