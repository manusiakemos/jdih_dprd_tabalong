<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderResource;
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        return SliderResource::collection(Slider::all());
    }

    public function store(Request $request)
    {
        $db = new Slider;
        $save = $this->saveData($db, $request);
        return $save ? responseJson("Slider berhasil ditambahkan") : responseJson("slider gagal ditambahkan");
    }


    public function show($id)
    {
        return new SliderResource(Slider::find($id));
    }

    public function update(Request $request, $id)
    {
        $db = Slider::find($id);
        $save = $this->saveData($db, $request);
        return $save ? responseJson("Slider berhasil diupdate") : responseJson("slider gagal diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $save = Slider::destroy($id);
        return $save ? responseJson("Slider berhasil dihapus") : responseJson("slider gagal dihapus");
    }

    private function saveData($db, $request)
    {
        $db->slide_nama = $request->slide_nama;
        if($request->has('slide_gambar')){
            $db->slide_gambar = $request->slide_gambar;
        }
        $db->slide_isi = $request->slide_isi;
        $db->slide_aktif = $request->slide_aktif;
        return $db->save();
    }
}
