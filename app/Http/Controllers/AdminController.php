<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Mail\ForgotPasswordMail;
use App\Tokens;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
	public function index()
	{
        $transaksis_new = DB::table('pesanans')
        		->leftJoin('customers', 'customers.id', '=', 'pesanans.customer_id')
        		->leftJoin('produks', 'produks.id', '=', 'pesanans.produk_id')
        		->leftJoin('pesanan_stats', 'pesanan_stats.id', '=', 'pesanans.produk_id')
        		->select('customers.name as cname', 
				'customers.tlp as ctlp',
				'customers.alamat as calamat',
				'produks.name as pname',
				'pesanans.status_id as stat',
				'pesanans.qty as qty',
				'pesanans.pembayaran as bayar')
				->where('pesanans.status_id', '=', 1)
                ->orderBy('pesanans.created_at', 'desc')
        		->get();
        $count1 = DB::table('pesanans')->where('status_id','=','1')->count();
        $transaksis_process = DB::table('pesanans')
        		->leftJoin('customers', 'customers.id', '=', 'pesanans.customer_id')
        		->leftJoin('produks', 'produks.id', '=', 'pesanans.produk_id')
        		->leftJoin('pesanan_stats', 'pesanan_stats.id', '=', 'pesanans.produk_id')
        		->select('customers.name as cname', 
				'customers.tlp as ctlp',
				'customers.alamat as calamat',
				'produks.name as pname',
				'pesanans.status_id as stat',
				'pesanans.qty as qty',
				'pesanans.pembayaran as bayar')
				->where('pesanans.status_id', '=', 2)
                ->orderBy('pesanans.created_at', 'desc')
        		->get();
        $count2 = DB::table('pesanans')->where('status_id','=','2')->count();
        $transaksis_pending = DB::table('pesanans')
        		->leftJoin('customers', 'customers.id', '=', 'pesanans.customer_id')
        		->leftJoin('produks', 'produks.id', '=', 'pesanans.produk_id')
        		->leftJoin('pesanan_stats', 'pesanan_stats.id', '=', 'pesanans.produk_id')
        		->select('customers.name as cname', 
				'customers.tlp as ctlp',
				'customers.alamat as calamat',
				'produks.name as pname',
				'pesanans.status_id as stat',
				'pesanans.qty as qty',
				'pesanans.pembayaran as bayar')
				->where('pesanans.status_id', '=', 3)
                ->orderBy('pesanans.created_at', 'desc')
        		->get();
        $count3 = DB::table('pesanans')->where('status_id','=','3')->count();
        $transaksis_completed = DB::table('pesanans')
        		->leftJoin('customers', 'customers.id', '=', 'pesanans.customer_id')
        		->leftJoin('produks', 'produks.id', '=', 'pesanans.produk_id')
        		->leftJoin('pesanan_stats', 'pesanan_stats.id', '=', 'pesanans.produk_id')
        		->select('customers.name as cname', 
				'customers.tlp as ctlp',
				'customers.alamat as calamat',
				'produks.name as pname',
				'pesanans.status_id as stat',
				'pesanans.qty as qty',
				'pesanans.pembayaran as bayar')
				->where('pesanans.status_id', '=', 4)
                ->orderBy('pesanans.created_at', 'desc')
        		->get();
        $count4 = DB::table('pesanans')->where('status_id','=','4')->count();
        return view('admin.dashboard.index', ['transaksis_new' => $transaksis_new,
									        	'transaksis_process' => $transaksis_process,
									        	'transaksis_pending' => $transaksis_pending,
									        	'transaksis_completed' => $transaksis_completed])
        									->with('count1', $count1)
        									->with('count2', $count2)
        									->with('count3', $count3)
        									->with('count4', $count4);
	}
}
