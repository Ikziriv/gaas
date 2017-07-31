<?php

namespace App\Repositories;

use App\Models\PesananStatus;

class PesananStatRepository
{
    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    protected $pesan_stat;

    /**
     * Create a new RolegRepository instance.
     *
     * @param  \App\Models\Role $pesan_stat
     * @return void
     */
    public function __construct(PesananStatus $pesan_stat)
    {
        $this->pesan_stat = $pesan_stat;
    }

    /**
     * Get all pesan_stats.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->pesan_stat->all();
    }

    /**
     * Get roles collection.
     *
     * @return Array
     */
    public function allSelect()
    {
        $select = $this->all()->pluck('name', 'id');

        return compact('select');
    }
}
