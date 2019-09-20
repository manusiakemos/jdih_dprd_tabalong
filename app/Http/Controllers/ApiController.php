<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArsipResource;
use App\Http\Resources\BeritaResource;
use App\Http\Resources\SettingResource;
use App\Model\Galeri;
use App\Model\Slider;
use App\Repositories\QueryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    public function slider()
    {
        $data = Slider::all();
        return $data;
    }

    public function gallery()
    {
        $data = Galeri::latest()->paginate(16);
        return $data;
    }

    public function terbaru()
    {
        $data = QueryRepository::terbaru(5)->get();
        return ArsipResource::collection($data);
    }

    public function terpopuler()
    {
        $data = QueryRepository::terpopuler(5)->get();
        return ArsipResource::collection($data);
    }

    public function arsip(Request $request)
    {

        $data = QueryRepository::arsip($request)->paginate();
        return ArsipResource::collection($data);
    }

    public function berita(Request $request)
    {
        $data = QueryRepository::berita($request)->paginate();
        return BeritaResource::collection($data);
    }

    public function beritaTerbaru()
    {
        $data = QueryRepository::beritaTerbaru()->paginate(6);
        return BeritaResource::collection($data);
    }

    public function beritaTerpopuler()
    {
        $data = QueryRepository::beritaPopuler()->paginate(6);
        return BeritaResource::collection($data);
    }

    public function beritaDetail($slug)
    {
        $data = QueryRepository::beritaDetail($slug)->first();
        $data->berita_hit = $data->berita_hit + 1;
        $data->save();
        return new BeritaResource($data);
    }

    public function setting()
    {
        $data = QueryRepository::setting()->get();
        return SettingResource::collection($data);
    }

    public function findSetting($name)
    {
        $data = QueryRepository::findSetting($name)->first();
        return new SettingResource($data);
    }

    public function download($slug)
    {
//        arsip_hits
        $data = QueryRepository::getArsipBySlug($slug)->firstOrFail();
        if ($data) {
            $data->arsip_hits = $data->arsip_hits + 1;
            $data->save();
            $filePath = "uploads/{$data->arsip_filename}";
            $headers = ['Content-Type: application/pdf'];
            $fileName = $data->arsip_slug.".pdf";
            return response()->file($filePath,$headers,$fileName);
        }
    }

    public function webMenu()
    {
        return QueryRepository::menu()->first();
    }

    public function webHalaman($halaman)
    {
        $data = Cache::get('cache_menu', function () use ($halaman) {
            return QueryRepository::getHalamanBySlug($halaman)->first();
        });
        return $data;
    }
}
