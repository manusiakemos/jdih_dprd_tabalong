<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArsipResource;
use App\Http\Resources\IntegrasiResource;
use App\Model\Arsip;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class ArsipController extends Controller
{

    public function index()
    {
        try {
            return DataTables::of(Arsip::query()->with('category'))
                ->addColumn('action', function ($value) {
                    return view('action.arsip', compact('value'));
                })
                ->editColumn('arsip_date', function ($value){
                    return tanggal_indo($value['arsip_date'], false, false);
                })
                ->toJson();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $request
     * @param null $id
     * @throws \Illuminate\Validation\ValidationException
     */
    public function rules($request, $id = null)
    {
        if($id){
            $rules = [
                'judul' => [
                    'required',
                    Rule::unique('arsip', 'arsip_title')
                        ->whereNull('deleted_at')
                        ->ignore($id,"arsip_id")
                ],
                'slug' => [
                    'required',
                    'alpha_dash',
                    Rule::unique('arsip', 'arsip_slug')
                        ->whereNull('deleted_at')
                        ->ignore($id,"arsip_id")
                ],
                'tahun' => 'required',
                'kategori' => 'required',
                'file' => 'nullable'
            ];
        }else{
           $rules = [
               'judul' => [
                   'required',
                   Rule::unique('arsip', 'arsip_title')
                       ->whereNull('deleted_at')
               ],
               'slug' => [
                   'required',
                   'alpha_dash',
                   Rule::unique('arsip', 'arsip_slug')
                       ->whereNull('deleted_at')
               ],
               'tahun' => 'required',
               'kategori' => 'required',
               'nomor' => 'required',
               'file' => 'required|mimes:pdf'
           ];
        }
        $this->validate($request,$rules);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        ini_set('post_max_size', '6G');
        ini_set('upload_max_filesize', '4G');
        ini_set('memory_limit', '-1');

        $this->rules($request, "");

        $db = new Arsip;

        $db->cat_id = $request->kategori;
        $db->user_id = auth('api')->id();
        $db->arsip_slug = $request->slug;
        $db->arsip_title = $request->judul;
        $db->arsip_nomor = $request->nomor;
        $db->arsip_tahun = $request->tahun;
        $db->arsip_date = $request->tanggal;
        $db->arsip_desc = $request->deskripsi;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = Str::random() . "." . $file->getClientOriginalExtension();
            $db->arsip_filename = $filename;
            $file->move(public_path("uploads"), $filename);
        }

        return $db->save()
            ? response()->json([
                "status" => true,
                "text" => "success",
                "message" => "Arsip Berhasil Ditambahkan",
            ])
            : response()->json([
                "status" => false,
                "text" => "error",
                "message" => "Arsip Gagal Ditambahkan",
            ]);
    }

    public function show($id)
    {
        return new ArsipResource(Arsip::find($id));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        ini_set('post_max_size', '6G');
        ini_set('upload_max_filesize', '4G');
        ini_set('memory_limit', '-1');

        $this->rules($request,$id);

        $db = Arsip::findOrFail($id);

        $db->cat_id = $request->kategori;
        $db->user_id = auth('api')->id();
        $db->arsip_slug = $request->slug;
        $db->arsip_title = $request->judul;
        $db->arsip_nomor = $request->nomor;
        $db->arsip_tahun = $request->tahun;
        $db->arsip_date = $request->tanggal;
        $db->arsip_desc = $request->deskripsi;

        if ($request->hasFile('file')) {
            $oldFileName = $db->arsip_filename;
            File::delete(public_path('/uploads/' . $oldFileName));
            $file = $request->file('file');
            $filename = Str::random() . "." . $file->getClientOriginalExtension();
            $db->arsip_filename = $filename;
            $file->move(public_path("uploads"), $filename);
        }

        return $db->save()
            ? response()->json([
                "status" => true,
                "text" => "success",
                "message" => "Arsip Berhasil Diupdate",
            ])
            : response()->json([
                "status" => false,
                "text" => "error",
                "message" => "Arsip Gagal Diupdate",
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Arsip $arsip
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $arsip = Arsip::find($id);
        $arsip->delete();
        return response()->json([
            "status" => true,
            "text" => "success",
            "message" => "Arsip berhasil dihapus"
        ]);
    }

    public function integrasi()
    {
        return IntegrasiResource::collection(Arsip::with('category')->get());
    }
}
