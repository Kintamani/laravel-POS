<?php

namespace POS\Http\Controllers;

use Illuminate\Http\Request;
use POS\Setting;
use POS\Kategori;
use POS\Produk;
use POS\Supplier;
use POS\Member;
use POS\penjualan;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting = Setting::find(1);
        $awal    = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('y')));
        $akhir   = date('Y-m-d');
        $tanggal = $awal;
        $data_tanggal = array();
        $data_pendapatan = array();

        while(strtotime($tanggal) <= strtotime($akhir)){
            $data_tanggal[] = (int)substr($tanggal, 8, 2);
            $pendapatan = Penjualan::where('created_at', 'LIKE', "$tanggal%")
                ->sum('bayar');
            $data_pendapatan[] =(int) $pendapatan;
            $tanggal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal))); 
        }

        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();

        if (Auth::user() -> level == 1) return view('home.admin', 
            compact('kategori', 'produk', 'supplier', 'member', 'awal', 'akhir', 'data_pendapatan', 'data_tanggal'));
        else return view('home.kasir', 
            compact('setting'));
    }
}
