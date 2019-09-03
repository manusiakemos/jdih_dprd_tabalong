<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArsipResource;
use App\Http\Resources\BeritaResource;
use App\Repositories\QueryRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function terbaru()
    {
        $data = QueryRepository::terbaru(6)->get();
        return ArsipResource::collection($data);
    }

    public function terpopuler()
    {
        $data = QueryRepository::terpopuler(6)->get();
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

    public function beritaDetail($slug)
    {
        $data = QueryRepository::beritaDetail($slug)->first();
        $data->berita_hit = $data->berita_hit + 1;
        $data->save();
        return new BeritaResource($data);
    }
}
