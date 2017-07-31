<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\LogProduk;
use App\Models\Kategori;
use App\Repositories\ProdukRepository;
use Carbon\Carbon;

class ProdukController extends Controller
{
	public function index(ProdukRepository $produkRepository)
	{
        $produks = $produkRepository->all();
        $details = DB::table('log_produks')
        ->leftJoin('produks', 'log_produks.produk_id', '=', 'produks.id')
        ->select('produks.nama as p_nama', 'log_produks.qty as qty', 'log_produks.created_at as created_at')
        ->orderBy('log_produks.id', 'desc')
        ->paginate(); 
        return view('admin.pages.produk.index')->with('produks', $produks)->with('details', $details);
    }

    public function readProduk()
    {
        $produks = DB::table('log_produks')->with('produk')->get(); 
        return view('admin.pages.produk.table', ['produks' => $produks]);
    }

	public function create()
	{
        return view('admin.pages.produk.create');
	}

    public function show($id)
    {
        $produk = Produk::find($id);
        $details = DB::table('log_produks')
        ->leftJoin('produks', 'log_produks.produk_id', '=', 'produks.id')
        ->select('produks.nama as p_nama', 'log_produks.qty as qty', 'log_produks.created_at as created_at')
        ->where("produks.id",$id)
        ->get(); 
        $total = DB::table('log_produks')->where("log_produks.produk_id",$id)->sum('qty');
        return view('admin.pages.produk.show')->with('produk', $produk)->with('details', $details)->with('total', $total);
    }

    public function editproduk(Request $request)
    {
        if ( $request->ajax() ) {
            $produk = Produk::find($request->id);
            $produk->nama = $request->nama;
            $produk->save();
            return response(['data' => 'Data berhasil diubah!', 'status' => 'success']);
        }
        return response(['data' => 'Data gagal diubah!', 'status' => 'failed']);
    }

    public function createstockProduk(Request $request)
    {
        if ( $request->ajax() ) {
            $data['produk_id'] = $request->produk_id;
            $data['qty'] = $request->qty;
            $data['user_id'] = $request->user()->id;
            $data['activity'] = 'tambah stock barang';

            LogProduk::create($data);

            $produk = Produk::findOrFail($request->produk_id);
            $produk2 = Produk::find(2);
            $produk4 = Produk::find(4);
            $produk6 = Produk::find(6);
            if($request->produk_id == 1)
            {
                $produk->qty += $request->qty;
                $produk->save();

                $produk2->qty += $request->qty;
                $produk2->save();
                return response(['data' => 'Penyimpanan data stock berhasil!', 'status' => 'success']); 
            }
            if($request->produk_id == 2)
            {
                $produk->qty += $request->qty;
                $produk->save();
                return response(['data' => 'Penyimpanan data stock berhasil!', 'status' => 'success']); 
            }
            if($request->produk_id == 3)
            {
                $produk->qty += $request->qty;
                $produk->save();

                $produk4->qty += $request->qty;
                $produk4->save();
                return response(['data' => 'Penyimpanan data stock berhasil!', 'status' => 'success']); 
            }
            if($request->produk_id == 4)
            {
                $produk->qty += $request->qty;
                $produk->save();
                return response(['data' => 'Penyimpanan data stock berhasil!', 'status' => 'success']); 
            }
            if($request->produk_id == 5)
            {
                $produk->qty += $request->qty;
                $produk->save();

                $produk6->qty += $request->qty;
                $produk6->save();
                return response(['data' => 'Penyimpanan data stock berhasil!', 'status' => 'success']); 
            }
            if($request->produk_id == 6)
            {
                $produk->qty += $request->qty;
                $produk->save();
                return response(['data' => 'Penyimpanan data stock berhasil!', 'status' => 'success']); 
            }
        }
        return response(['data' => 'Penyimpanan data stock gagal!', 'status' => 'failed']);
    }

    public function editstockproduk(Request $request)
    {
        if ( $request->ajax() ) {
            $d_produk = DetailProduk::find($request->id);
            $d_produk->produk_id = $request->produk_id;
            $d_produk->qty = $request->qty;
            $d_produk->save();
            return response(['data' => 'Pengubahan data stock berhasil!', 'status' => 'success']);
        }
        return response(['data' => 'Pengubahan data stock gagal!', 'status' => 'failed']);
    }
    
    // delete Produk
    public function deletestockProduk(Request $request, $id, DetailProduk $detail) {
        if ( $request->ajax() ) {
            $detail->destroy($id, $request->all());
            return response(['msg' => 'Penghapusan data stock berhasil!', 'status' => 'success']);
        }
        return response(['msg' => 'Penghapusan data stock gagal!', 'status' => 'failed']);
    }
}
