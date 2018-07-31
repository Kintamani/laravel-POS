<?php

namespace POS\Http\Controllers;

use Illuminate\Http\Request;
use POS\Produk;
use POS\Kategori;
use PDF;
use Datatables;

class ProdukController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        return view ('produk.index',compact('kategori'));
    }

    public function listData()
    {
        $produk = Produk::leftJoin('kategori','kategori.id_kategori','=','produk.id_kategori')->orderBy('produk.id_produk','desc')->get();
        $no = 0;
        $data = array();
        foreach ($produk as $list) {
            $no++;
            $row =array();
            $row[] = "<input type='checkbox' name='id[]''value='".$list->id_produk."' >";
            $row[] = $no;
            $row[] = $list -> kode_produk;
            $row[] = $list -> nama_produk;
            $row[] = $list -> nama_kategori;
            $row[] = $list -> merk;
            $row[] = "Rp.".format_uang($list->harga_beli);
            $row[] = "Rp.".format_uang($list->harga_jual);
            $row[] = $list -> diskon."%";
            $row[] = $list -> stock;
            $row[] = "<div class='btn-group'>
                <a onclick='aditForm(".$list->id_produk.")' class='btn btn-primary btn-sm'></a><i class='fa fa-pencil'></i>
                <a onclick='deleteForm(".$list->id_produk.")' class='btn btn-danger btn-sm'></a><i class='fa fa-trash'></i>
            </div>";
            $data = $row;
        }
        return Datatables::of($data)->escapeColumns([])->make(true);
    }

    // public function create()
    // {
    //     //
    // }

    public function store(Request $request)
    {
        $jml = Produk::where('kode_produk', '=', $request['kode'])->count();
        if ($jml<1) {
            $produk = new Produk;
            $produk-> kode_produk = $request['kode'];
            $produk-> nama_produk = $request['nama'];
            $produk-> id_kategori = $request['kategori'];
            $produk-> merk = $request['merk'];
            $produk-> harga_beli = $request['harga_beli'];
            $produk-> diskon = $request['diskon'];
            $produk-> harga_jual = $request['harga_jual'];
            $produk-> stock = $request['stock'];
            $produk-> save();
            echo json_encode(array('msg'=>'success'));
        } 
        else {
            echo json_encode(array('msg'=>'error'));
        }
        
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $produk = Produk::find($id);
        echo json_encode($produk);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk-> nama_produk = $request['nama'];
        $produk-> id_kategori = $request['kategori'];
        $produk-> merk = $request['merk'];
        $produk-> harga_beli = $request['harga_beli'];
        $produk-> diskon = $request['diskon'];
        $produk-> harga_jual = $request['harga_jual'];
        $produk-> stock = $request['stock'];
        $produk-> update();
        echo json_encode(array('msg'=>'success'));
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk = delete();
    }

    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $produk = Produk::find($id);
            $produk = delete();
        }
    }

    public function printBarcode(Request $request)
    {
        $dataproduk = array();
        foreach ($request['id'] as $id) {
            $produk = Produk::find(id);
            $dataproduk[] = $produk;
        }
        $no =1;
        $pdf = PDF::loadView('produk.barcode',compact('dataproduk','no'));
        $pdf->setPaper('a4','potrait');
        return $pdf->stream();
    }
}