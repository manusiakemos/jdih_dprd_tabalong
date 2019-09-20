<?php

namespace App\Http\Controllers;

use App\Http\Resources\GaleriResource;
use App\Model\Galeri;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Galeri::paginate(100);
        return GaleriResource::collection($data);
    }

    public function store(Request $request)
    {
        $db = new Galeri;
        $insert = $this->dbInsertUpdate($db, $request);
        return $insert ? responseJson("Galeri berhasil ditambahkan") : "";
    }

    public function dbInsertUpdate($db, $request)
    {
        $db->gal_title = $request->gal_title;
        $db->gal_caption = $request->gal_caption;
        if($request->has('gal_filename')){
            $db->gal_filename = $request->gal_filename;
        }
        return $db->save();
    }

    public function show($id)
    {
        return new GaleriResource(Galeri::find($id));
    }

    public function update(Request $request, $id)
    {
        $db = Galeri::find($id);
        $insert = $this->dbInsertUpdate($db, $request);
        return $insert ? responseJson("Galeri berhasil diupdate") : "";
    }

    public function destroy($id)
    {
        $deslete = Galeri::find($id)->delete();
        return $deslete ? responseJson("Galeri berhasil dihapus") : "";
    }
}
