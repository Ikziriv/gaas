<?php

namespace App\Repositories;

use DB;
use App\Models\Customer;
use App\Models\Pesanan;
use App\Models\PesananStatus;

class CustomerRepository extends BaseRepository
{
    /**
     * The PesananStatus instance.
     *
     * @var \App\Models\PesananStatus
     */
    protected $pesanan_stat;

    /**
     * Create a new CustomerRepository instance.
     *
     * @param  \App\Models\Pesanan $pesanan
     * @param  \App\Models\PesananStatus $pesanan_stat
     * @return void
     */
    public function __construct(Customer $customer, Pesanan $pesanan, PesananStatus $pesanan_stat)
    {
        $this->model = $customer;
        $this->pesanan = $pesanan;
        $this->pesanan_stat = $pesanan_stat;
    }

    /**
     * Get customers collection paginate.
     *
     * @param  int  $n
     * @param  string  $pesanan_stat
     * @return \Illuminate\Support\Collection
     */
    public function getCustomerWithStat($n, $pesanan_stat)
    {
        $query = $this->pesanan->with('status')->with('customer')->oldest('created_at')->latest();

        if ($pesanan_stat != 'total') {
            $query->whereHas('status', function ($q) use ($pesanan_stat) {
                $q->whereSlug($pesanan_stat);
            });
        }

        return $query->simplePaginate($n);
    }

    /**
     * Count the customers for a role.
     *
     * @param  string  $role
     * @return int
     */
    public function count($pesanan_stat = null)
    {
        if ($pesanan_stat) {
            return $this->pesanan
                ->whereHas('status', function ($q) use ($pesanan_stat) {
                    $q->whereSlug($pesanan_stat);
                })->count();
        }

        return $this->pesanan->count();
    }

    /**
     * Counts the customers.
     *
     * @param  string  $pesanan_stat
     * @return int
     */
    public function counts()
    {
        $counts = [
            'new' => $this->count('new'),
            'otw' => $this->count('otw'),
            'completed' => $this->count('completed')
        ];

        $counts['total'] = array_sum($counts);

        return $counts;
    }

    private function save($customer, $inputs)
    {       
        if(isset($inputs['active'])) 
        {
            $customer->active = $inputs['active'] == 'true';       
        }   
        $customer->save();
    }

    public function update($inputs, $customer)
    {
        $this->save($customer, $inputs);
    }
}
