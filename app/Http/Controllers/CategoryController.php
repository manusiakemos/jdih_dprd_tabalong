<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\SelectDataResource;
use App\Model\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function list()
    {
        $data = Category::all();
        $res = new SelectDataResource($data, "cat_id", "cat_name");
        return $res->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        return DataTables::of(Category::query())
            ->addColumn('action', function ($value){
                return view('action.category', compact('value'));
            })
            ->toJson();
    }


    public function store(Request $request)
    {
        $db = new Category;
        $db->cat_name = $request->nama_kategori;
        return $db->save()
            ? response()->json([
                "status" => true,
                "text" => "success",
                "message" => "kategori Berhasil Ditambahkan",
            ])
            : response()->json([
                "status" => false,
                "text" => "error",
                "message" => "kategori Gagal Ditambahkan",
            ]);
    }


    public function show($id)
    {
        return new CategoryResource(Category::find($id));
    }

    public function update(Request $request, $id)
    {
        $db = Category::findOrFail($id);
        $db->cat_name = $request->nama_kategori;
        return $db->save()
            ? response()->json([
                "status" => true,
                "text" => "success",
                "message" => "kategori Berhasil Diupdate",
            ])
            : response()->json([
                "status" => false,
                "text" => "error",
                "message" => "kategori Gagal Diupdate",
            ]);
    }

    public function destroy($id)
    {
        $db = Category::findOrFail($id);
        $db->delete();
        return $db->save()
            ? response()->json([
                "status" => true,
                "text" => "success",
                "message" => "kategori Berhasil Dihapus",
            ])
            : response()->json([
                "status" => false,
                "text" => "error",
                "message" => "kategori Gagal Dihapus",
            ]);
    }
}
