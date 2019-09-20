<?php

namespace App\Repositories;


use App\Model\Arsip;
use App\Model\Berita;
use App\Model\Halaman;
use App\Model\Menu;
use App\Model\Setting;
use Illuminate\Support\Facades\DB;

class QueryRepository
{
    public static function terbaru($take)
    {
        return Arsip::with('category')
            ->latest()
            ->take($take);
    }

    public static function terpopuler($take)
    {
        return Arsip::with('category')
            ->orderBy('arsip_hits', 'desc')
            ->take($take);
    }

    public static function arsip($request)
    {
        $judul = $request->judul;
        $jenis = $request->jenis;
        $nomor = $request->nomor;
        $tahun = $request->tahun;

        $data = Arsip::with('category');
        if($judul){
            $data = $data->where('arsip_title', 'like', "%$judul%");
        }
        if($jenis){
            $data = $data->where('cat_id', '=', $jenis);
        }
        if($nomor){
            $data = $data->where('arsip_nomor', '=', $nomor);
        }
        if($tahun){
            $data = $data->where('arsip_tahun', '=', $tahun);
        }

        return $data;
    }

    public static function berita($request)
    {
        $search = $request->search;
        $data = Berita::with('category')->with('user');
        if($search){
            $data = $data->where('berita_judul', 'like', "%$search%")
                ->orWhere('berita_isi', 'like', "%$search%");
        }
        return $data;
    }

    public static function beritaTerbaru()
    {
        $data = Berita::with('category')->orderBy('created_at', 'desc')
            ->where('berita_aktif', true)
            ->with('user');
        return $data;
    }

    public static function beritaPopuler()
    {
        $data = Berita::with('category')
            ->orderBy('berita_hit', 'desc')
            ->where('berita_aktif', true)
            ->with('user');
        return $data;
    }

    public static function beritaDetail($slug)
    {
        $data =  Berita::with('category')->orderBy('created_at', 'desc')
            ->where('berita_aktif', true)
            ->where('berita_url', $slug)
            ->with('user');
        return $data;
    }

    public static function setting()
    {
        return Setting::query();
    }

    public static function findSetting($name)
    {
        return self::setting()->where('name',$name);
    }

    public static function getArsipBySlug($slug)
    {
        return Arsip::where('arsip_slug', '=', $slug);
    }

    public static function joinArsip()
    {
        return Arsip::join('category', 'category.cat_id', '=', 'arsip.cat_id');
    }

    public static function menu()
    {
        return Setting::where('name', 'menu');
    }

    public static function getHalamanBySlug($halaman)
    {
        return Halaman::where('hal_url', $halaman);
    }

}