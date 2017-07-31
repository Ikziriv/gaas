<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Repositories\CustomerRepository;

use Yajra\Datatables\Facades\Datatables;
use Validator;
use Excel;

class CustomerController extends Controller
{
    protected $customer_sec;
    public function __construct(
        CustomerRepository $customer_sec)
    {
        $this->customer_sec = $customer_sec;
    }

	public function index(Request $request)
	{
        $customers = Customer::where(function($query) use ($request) {
            if(($term = $request->get('term'))){
                $query->where('name', 'like', '%' . $term . '%')
                        ->orWhere('tlp', 'like', '%' . $term . '%');
            }
        })->orderBy("id", "desc")->get(); 
        return view('admin.pages.customer.index', ['customers' => $customers]);
	}

    public function importExcel(Request $request)
    {
        if($request->hasFile('import_customer')){
            $path = $request->file('import_customer')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = ['name' => $v['name'], 
                                        'email' => $v['email'],
                                        'alamat' => $v['alamat'],
                                        'tlp' => $v['tlp'],
                                        'active' => $v['active']
                                        ];
                        }
                    }
                }

                if(!empty($insert)){
                    Customer::firstOrCreate($insert);
                    return back()->with('success','Insert Record successfully.');
                }
            }
        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }

    public function exportExcel(Request $request, $type)
    {
        Excel::create('gas_customer', function($excel) {
            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Gas Customer');
            $excel->setCreator('Laravel')->setCompany('PT GASINDO, Jakarta');
            $excel->setDescription('customer file');
            $excel->sheet('customer_data', function($sheet)
            {   
                // first row styling and writing content
                $sheet->mergeCells('A1:I1');
                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Calibri Sans-serif');
                    $row->setFontSize(24);
                });
                $sheet->row(1, array('PT. GASINDO'));
                // second row styling and writing content
                $sheet->mergeCells('A2:I2');
                $sheet->row(2, function ($row) {

                    // call cell manipulation methods
                    $row->setFontFamily('Calibri Sans-serif');
                    $row->setFontSize(12);

                });
                $sheet->row(2, array('JL. Pondok Indah Raya'));
                $sheet->mergeCells('A3:I3');
                $dataCustomer = Customer::get()->toArray();
                // Font family
                // setting column names for data - you can of course set it manually
                $sheet->appendRow(array_keys($dataCustomer[0])); // column names

                // getting last row number (the one we already filled and setting it to bold
                $sheet->row($sheet->getHighestRow(), function ($row) {
                    $row->setFontWeight('bold');
                });

                // putting dataCustomer data as next rows
                foreach ($dataCustomer as $cust) {
                    $sheet->appendRow($cust);
                }
            });
        })->download($type);
    }

    public function getCustomer(Request $request)
    {
        $request_data = $request->all();
        $user_id = $request_data['id'];
        $user_data = Customer::where('id', $user_id)->first();
        return response()->json($user_data);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        $orders = DB::table('pesanans')
            ->leftJoin('customers', 'customers.id', '=', 'pesanans.customer_id')
            ->leftJoin('produks', 'produks.id', '=', 'pesanans.produk_id')
            ->select('produks.nama as p_nama', 'pesanans.qty as qty', 'pesanans.created_at as created_at')
            ->where('pesanans.customer_id',$id)
            ->simplePaginate(7); 
        $total = DB::table('pesanans')->where("pesanans.customer_id",$id)->sum('qty');
        if($total <= 0) {
            return redirect('transaksi/create');
        }
        return view('admin.pages.customer.show')
            ->with('customer', $customer)
            ->with('orders', $orders)
            ->with('total', $total);
    }

    public function getInvoice($id)
    {
        $customer = Customer::find($id);
        $orders = DB::table('pesanans')
            ->leftJoin('customers', 'customers.id', '=', 'pesanans.customer_id')
            ->leftJoin('produks', 'produks.id', '=', 'pesanans.produk_id')
            ->select('produks.nama as p_nama', 'pesanans.qty as qty', 'pesanans.created_at as created_at')
            ->where('pesanans.customer_id',$id)
            ->latest()
            ->simplePaginate(1); 
        return view('admin.pages.customer.invoice')
            ->with('customer', $customer)
            ->with('orders', $orders);
    }

    public function getActive(Request $request, Customer $customer)
    {
        $this->customer_sec->update($request->all(), $customer);
        return response()->json(['status' => 'ok']);

    }
    // add data into database
    public function addCustomer(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'tlp' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('customer')
                        ->withErrors($validator)
                        ->withInput();
        }
        // Store
        if ( $request->ajax() ) {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->alamat = $request->alamat;
            $customer->tlp = $request->tlp;
            $customer->active = $request->active;
            $customer->save();
            return response(['data' => 'Penyimpanan data customer berhasil!', 'status' => 'success']);
        }
        return response(['data' => 'Penyimpanan data customer gagal!', 'status' => 'failed']);
    }

    // edit data function
    public function editCustomer(Request $request) {
        if ( $request->ajax() ) {
            $customer = Customer::find ($request->id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->alamat = $request->alamat;
            $customer->tlp = $request->tlp;
            $customer->active = $request->active;
            $customer->save();
            return response(['data' => 'Perubahan data customer berhasil!', 'status' => 'success']);
        }
        return response(['data' => 'Perubahan data customer gagal!', 'status' => 'failed']);
    }
    
    // delete Customer
    public function deleteCustomer(Request $request, $id, Customer $customer) {
        if ( $request->ajax() ) {
            $customer->destroy($id, $request->all());
            return response(['msg' => 'Penghapusan data customer berhasil!', 'status' => 'success']);
        }
        return response(['msg' => 'Penghapusan data customer gagal!', 'status' => 'failed']);
    }
}
