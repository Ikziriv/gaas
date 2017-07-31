<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\CustomerRepository;
use App\Repositories\TransaksiRepository;
use App\Repositories\PesananStatRepository;
use App\Models\Produk;
use App\Models\DetailProduk;
use App\Models\Customer;
use App\Models\Pesanan;
use Carbon\Carbon;
use Validator;
use Excel;
use PDF;

class TransaksiController extends Controller
{
    protected $customerRepository;
    protected $transaksiRepository;

    protected $pesananStatRepository;

    public function __construct(CustomerRepository $customerRepository, 
                                TransaksiRepository $transaksiRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->transaksiRepository = $transaksiRepository;
    }

	public function index()
	{
        $transaksis = $this->transaksiRepository->index();
        return view('admin.pages.transaksi.index', compact('transaksis'));
	}

    public function getDay(Request $request)
    {
        //$day = Carbon::now()->startOfDay();
        //$orders = $this->transaksiRepository->indexReport(10);
        $orders = DB::table('pesanans')
            ->leftJoin('customers', 'customers.id', '=', 'pesanans.customer_id')
            ->leftJoin('produks', 'produks.id', '=', 'pesanans.produk_id')
            ->select('customers.name as c_nama', 'produks.nama as p_nama','pesanans.qty as qty', 'pesanans.created_at as created_at')
            ->whereDay('pesanans.created_at', date('d'))
            ->orderBy('pesanans.id', '=', 'desc')
            ->simplePaginate(10); 
        if(empty($orders)) {
            $total = "";
        } else {
            $total = DB::table('pesanans')->whereDay('pesanans.created_at', date('d'))->sum('qty');
        }
        return view('admin.pages.transaksi.report.daily')
                ->with('orders', $orders)->with('total', $total);
    }

    public function exportDayExcel(Request $request, $type)
    {
        $orders = \App\Models\Pesanan::whereDay('created_at', '=', date('d'))->with(['produk','customer'])->get();

        $total = Pesanan::whereDay('created_at', '=', date('d'))->count();
        Excel::create('transaksi_harian', function($excel) use ($orders, $total) {
            $excel->sheet('excel_report_harian', function($sheet) use ($orders, $total) {
                // Set font with ->setStyle()`
                $sheet->mergeCells('A1:E1');
                $sheet->mergeCells('A2:E2');
                $sheet->mergeCells('A3:E3');
                $sheet->mergeCells('A4:E4');
                $sheet->mergeCells('A5:E5');
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12
                    )
                ));
                $sheet->loadView('admin.pages.transaksi.report.excelday')
                        ->with("orders", $orders)
                        ->with("total", $total);
            });
        })->export($type);
    }

    public function getDayPdf(Request $request)
    {
        $orders = \App\Models\Pesanan::whereDay('created_at', '=', date('d'))->with(['produk','customer'])->get();
        view()->share('orders',$orders);

        if($request->has('download')){
            $pdf = PDF::loadView('admin.pages.transaksi.report.pdfharian');
            return $pdf->download('pdf_report_harian.pdf');
        }

        return view('admin.pages.transaksi.report.pdfharian');
    }

    public function getMonth(Request $request)
    {
        //$month = Carbon::now();
        //dd($month);
        // $orders = $this->transaksiRepository->indexReport(30);
        $orders = DB::table('pesanans')
            ->leftJoin('customers', 'customers.id', '=', 'pesanans.customer_id')
            ->leftJoin('produks', 'produks.id', '=', 'pesanans.produk_id')
            ->select('customers.name as c_nama', 'produks.nama as p_nama', 'pesanans.qty as qty', 'pesanans.created_at as created_at')
            ->whereMonth('pesanans.created_at', '=', date('m'))
            ->orderBy('pesanans.id', '=', 'desc')
            ->simplePaginate(10); 
        if(empty($orders)) {
            $total = "";
        } else {
            $total = DB::table('pesanans')->whereMonth('pesanans.created_at', '=', date('m'))->sum('qty');
        }
        return view('admin.pages.transaksi.report.month')
                ->with('orders', $orders)->with('total', $total);
    }    

    public function exportMonthExcel(Request $request, $type)
    {
        $orders = \App\Models\Pesanan::whereMonth('created_at', '=', date('m'))->with(['produk','customer'])->get();
        $total = Pesanan::whereMonth('created_at', '=', date('m'))->count();
        Excel::create('transaksi_bulanan', function($excel) use ($orders, $total) {
            $excel->sheet('excel_report_bulanan', function($sheet) use ($orders, $total) {
                // Set font with ->setStyle()`
                $sheet->mergeCells('A1:E1');
                $sheet->mergeCells('A2:E2');
                $sheet->mergeCells('A3:E3');
                $sheet->mergeCells('A4:E4');
                $sheet->mergeCells('A5:E5');
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  12
                    )
                ));
                $sheet->loadView('admin.pages.transaksi.report.excelmonth')
                        ->with("orders", $orders)
                        ->with("total", $total);
            });
        })->export($type);
    }

    public function getMonthPdf(Request $request)
    {
        $orders = \App\Models\Pesanan::whereMonth('created_at', '=', date('m'))->with(['produk','customer'])->get();
        view()->share('orders',$orders);

        if($request->has('download')){
            $pdf = PDF::loadView('admin.pages.transaksi.report.pdfbulanan');
            return $pdf->download('pdf_report_bulanan.pdf');
        }

        return view('admin.pages.transaksi.report.pdfbulanan');
    }

    public function getCustomer(Request $request)
    {
        $request_data = $request->all();
        $user_id = $request_data['id'];
        $user_data = DB::table('customers')->where('id', $user_id)->first();        
        return response()->json($user_data);
    }

    // add data into database
    public function addOrder(Request $request) {
            // // validasi stock barang 1 - 6
            $tbg = DB::table('produks')
                    ->where('produks.id', '=', $request->produk_id)
                    ->sum('qty');
            if ($tbg <= 0) {
                //flash('Maaf Stock Barang Habis', 'danger');
                return redirect('transaksi/create')->with('status', 'Maaf Stock Habis!');
            } else {
                foreach ($request->produk_id as $key => $value) {

                   $validator = Validator::make($request->all(), [
                        'customer_id.*' => 'required',
                        'produk_id.*' => 'required',
                        'new.*' => 'required',
                        'otw.*' => 'required',
                        'done.*' => 'required',
                        'qty.*' => 'required',
                        'created_at.*' => 'required'
                    ]);

                    if($validator->fails()) {
                        return back()->withInput()->withErrors($validator->errors());
                    }
                    $data = array(
                                    'customer_id' => $request->customername [$key],
                                    'produk_id' => $value,
                                    'new' => $request->new [$key],
                                    'otw' => $request->otw [$key],
                                    'done' => $request->done [$key],
                                    'qty' => $request->qty [$key],
                                    'created_at' => $request->created_at [$key]
                                );
                    if($request->qty [$key] > $tbg)
                    {
                        return redirect('transaksi/create')->with('status', 'Maaf Stock Habis!');
                    }
                    Pesanan::insert($data);
                    $produk = Produk::findOrFail($value);
                    $produk2 = Produk::find(2);
                    $produk4 = Produk::find(4);
                    $produk6 = Produk::find(6);
                    if($value == 1)
                    {
                        $produk->qty -= $request->qty [$key];
                        $produk->save();

                        $produk2->qty -= $request->qty [$key];
                        $produk2->save(); 
                    }
                    if($value == 2)
                    {
                        $produk->qty -= $request->qty [$key];
                        $produk->save(); 
                    }
                    if($value == 3)
                    {
                        $produk->qty -= $request->qty [$key];
                        $produk->save();

                        $produk4->qty -= $request->qty [$key];
                        $produk4->save(); 
                    }
                    if($value == 4)
                    {
                        $produk->qty -= $request->qty [$key];
                        $produk->save(); 
                    }
                    if($value == 5)
                    {
                        $produk->qty -= $request->qty [$key];
                        $produk->save();

                        $produk6->qty -= $request->qty [$key];
                        $produk6->save(); 
                    }
                    if($value == 6)
                    {
                        $produk->qty -= $request->qty [$key];
                        $produk->save(); 
                    }
                    // $produk->qty -= $request->qty [$key];
                    // $produk->save();
                    // DetailProduk::where('id',$value)->update(['qty'=> $produk->qty]);
                    if($produk->qty <= 0)
                    {
                        return redirect('transaksi/create')->with('status', 'Maaf Stock Habis!');
                    }
                }
                return redirect('transaksi/create')->with('status', 'Order Berhasil Disimpan!');
            }

            // $produk = DetailProduk::findOrFail($request->produk_id);
            // $produk->qty -= $request->qty; 
            // $produk->save();

            // $validator = Validator::make($request->all(), [
            //     'name' => 'required|max:255',
            //     'email' => 'required',
            //     'alamat' => 'required',
            //     'tlp' => 'required',
            //     'active' => 'required',
            //     'produk_id' => 'required',
            //     'qty' => 'required',
            // ]);

            // if ($validator->fails()) {
            //     return redirect('transaksi/create')
            //                 ->withErrors($validator)
            //                 ->withInput();
            // }
            // // Store
            // $customer = new Customer();
            // $customer->name = $request->name;
            // $customer->email = $request->email;
            // $customer->alamat = $request->alamat;
            // $customer->tlp = $request->tlp;
            // $customer->active = $request->active;
            //     if($customer->save()){
            //         $id = $customer->id;
            //         foreach ($request->produk_id as $key => $value) {
            //             $data = array('customer_id' => $id,
            //                             'produk_id' => $value,
            //                             'new' => $request->new [$key],
            //                             'otw' => $request->otw [$key],
            //                             'done' => $request->done [$key],
            //                             'qty' => $request->qty [$key]);
            //             Pesanan::insert($data);
            //         }
            //         return redirect('transaksi/create')->with('status', 'Order Berhasil Disimpan!');
            //     }

    }
    
    // add data into database
    // public function addTransCustomer(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:255',
    //         'email' => 'required',
    //         'alamat' => 'required',
    //         'tlp' => 'required',
    //         'active' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect('transaksi.create')
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }
    //     // Store
    //     if ( $request->ajax() ) {
    //         $customer = new Customer();
    //         $customer->name = $request->name;
    //         $customer->email = $request->email;
    //         $customer->alamat = $request->alamat;
    //         $customer->tlp = $request->tlp;
    //         $customer->active = $request->active;
    //         $customer->save();
    //         return response(['data' => 'Penyimpanan data customer berhasil!', 'status' => 'success']);
    //     }
    //     return response(['data' => 'Penyimpanan data customer gagal!', 'status' => 'failed']);
    // }

    public function getOtw(Request $request, Pesanan $pesanan)
    {
        $this->transaksiRepository->update($request->all(), $pesanan);
        return response()->json(['status' => 'ok']);
    }

    public function getDone(Request $request, Pesanan $pesanan)
    {
        $this->transaksiRepository->update($request->all(), $pesanan);
        return response()->json(['status' => 'ok']);
    }

    public function create()
    {
        $cnames = DB::table('customers')->where('active', 1)->pluck('name', 'id');
        $ctlp = DB::table('customers')->where('active', 1)->pluck('tlp', 'id');
        $jns_b = Produk::pluck('nama', 'id');
        return view('admin.pages.transaksi.create', compact('transaksis', 'cnames', 'ctlp', 'jns_b'));
    }

	public function getReport()
	{
        return view('admin.pages.transaksi.report');
	}
}
