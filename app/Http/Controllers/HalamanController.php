<?php

namespace App\Http\Controllers;

use App\Http\Resources\HalamanResource;
use App\Model\Halaman;
use Illuminate\Http\Request;

class HalamanController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return HalamanResource::collection(Halaman::all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new Halaman;
        $db->hal_url = $request->hal_url;
        $db->hal_judul = $request->hal_judul;
        $db->hal_isi = $request->hal_isi;
        $db->hal_aktif = $request->hal_aktif;
        $db->hal_custom = $request->hal_custom;
        $db->save();
        return responseJson('Halaman berhasil diupdate');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = Halaman::find($id);
        $db->hal_url = $request->hal_url;
        $db->hal_judul = $request->hal_judul;
        $db->hal_isi = $request->hal_isi;
        $db->hal_aktif = $request->hal_aktif;
        $db->hal_custom = $request->hal_custom;
        $db->save();
        return responseJson('Halaman berhasil diupdate');
    }

    /**
     * @param Halaman $halaman
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Halaman $halaman)
    {
        $halaman->delete();
        return responseJson('Halaman Berhasil Dihapus');
    }
}
