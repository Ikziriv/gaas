<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use Carbon\Carbon;

class KategoriController extends Controller
{
	public function index()
	{
        $kategoris = DB::table('kategoris')->get();
        return view('admin.pages.kategori.index', ['kategoris' => $kategoris]);
	}

	public function create()
	{
        return view('admin.pages.kategori.create');
	}

	public function edit()
	{
        return view('admin.pages.kategori.edit');
	}
}
