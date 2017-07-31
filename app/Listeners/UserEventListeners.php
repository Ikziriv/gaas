<?php

namespace App\Listeners;

use App\Events\User\Activate;
use App\Events\User\Deleted;
use App\Events\User\LoggedIn;
use App\Events\User\LoggedOut;
use App\Events\User\PermissionCreated;
use App\Events\User\PermissionDeleted;
use App\Events\User\ProfileEdited;
use App\Events\User\Registered;
use App\Events\User\RoleCreated;
use App\Events\User\RoleDeleted;
use App\Services\Logger;
use Illuminate\Support\Facades\Auth;

class UserEventListeners
{
    private $logger;

    function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }
    
    public function userLoggedIn(LoggedIn $event)
    {
        $name = Auth::user()->name;
        $this->logger->log("Pengguna dengan nama {$name} login system");
    }

    public function userLoggedOut(LoggedOut $event)
    {
        $name = Auth::user()->name;
        $this->logger->log("Pengguna dengan nama {$name} logged out");
    }

    public function userProfileEdited(ProfileEdited $event)
    {
        $name = Auth::user()->name;
        $this->logger->log("Pengguna {$name} mengubah profile");
    }

    public function userRegistered(Registered $event)
    {
        $event->handleUserRegistration(); // handling activities on user register
        $name = $event->getUserName();
        $this->logger->log("Pengguna baru {$name} terdaftar. Menunggu aktifasi.");
    }

    public function userActivated(Activate $event)
    {
        $name = $event->getName();
        $this->logger->log("Pengguna {$name} telah aktif.");
    }

    public function userDeleted(Deleted $event)
    {
        $name = $event->getName();
        $this->logger->log("Pengguna {$name} telah dihapus.");
    }

    public function roleCreated(RoleCreated $event)
    {
        $name = $event->getName();
        $this->logger->log("Jabatan {$name} baru dibuat.");
    }

    public function roleDeleted(RoleDeleted $event)
    {
        $name = $event->getName();
        $this->logger->log("Jabatan {$name} telah dihapus.");
    }

    public function permissionCreated(PermissionCreated $event)
    {
        $name = $event->getName();
        $this->logger->log("Izin baru {$name} telah dibuat.");
    }

    public function permissionDeleted(PermissionDeleted $event)
    {
        $name = $event->getName();
        $this->logger->log("Izin {$name} telah dihapus.");
    }

    public function subscribe($events)
    {
        $class = 'App\Listeners\UserEventListeners';
        $events->listen(LoggedIn::class, "{$class}@userLoggedIn");
        $events->listen(LoggedOut::class, "{$class}@userLoggedOut");
        $events->listen(ProfileEdited::class, "{$class}@userProfileEdited");
        $events->listen(Registered::class, "{$class}@userRegistered");
        $events->listen(Activate::class, "{$class}@userActivated");
        $events->listen(Deleted::class, "{$class}@userDeleted");
        $events->listen(RoleCreated::class, "{$class}@roleCreated");
        $events->listen(RoleDeleted::class, "{$class}@roleDeleted");
        $events->listen(PermissionCreated::class, "{$class}@permissionCreated");
        $events->listen(PermissionDeleted::class, "{$class}@permissionDeleted");
    }
}