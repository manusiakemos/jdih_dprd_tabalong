<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function admin()
    {
        return view('layouts.stisla_vue');
    }

    public function home()
    {
//        return view('home');
        return view('layouts.master');
    }
/*
    public function berita()
    {
        return view('berita');
    }

    public function arsip()
    {
        return view('arsip');
    }

    public function arsipFilter()
    {

    }

    public function halaman($halaman)
    {
        return $halaman;
    }

    public function galeri()
    {

    }*/
}
