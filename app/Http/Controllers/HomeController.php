<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArsipDetailResource;
use App\Http\Resources\ArsipResource;
use App\Model\Arsip;
use App\Model\ArsipDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function chart(Request $request)
    {
        return 'chart';
    }
}
