<?php

namespace App\Http\Controllers;

use App\Models\Menu;
// use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function getmenu()
    {
        $getmenu = Menu::get();
        return response()->json($getmenu);
    }

    public function selectmenu($id)
    {
        $getmenu = Menu::where('id_menu', $id)->get();
        return response()->json($getmenu);
    }

    public function createmenu(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama' => 'required|unique:menus',
            'jenis' => 'required',
            'harga' => 'required',
            // 'jumlah_pesan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->tojson());
        }

        $create = Menu::create([
            'nama' => $req->input('nama'),
            'jenis' => $req->input('jenis'),
            'harga' => $req->input('harga'),
        ]);

        if ($create) {
            return response()->json(['Message' => 'Berhasil']);
        } else {
            return response()->json(['Message' => 'Gagal']);
        }
    }

    public function updatemenu(Request $r, $id)
    {
        $update = Menu::where('id_menu', $id)->update([
            'nama' => $r->input('nama'),
            'jenis' => $r->input('jenis'),
            'harga' => $r->input('harga'),
        ]);

        if ($update) {
            return response()->json(['Message' => 'Berhasil']);
        } else {
            return response()->json(['Message' => 'Gagal']);
        }
    }

    public function deletemenu($id)
    {
        $delete = DB::table('menus')->where('id_menu', $id)->delete();
        if ($delete) {
            return response()->json('Berhasil');
        } else {
            return response()->json('Menu Tidak Ada / Sudah Terhapus');
        }
    }
}
