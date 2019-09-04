<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArsipDetailResource;
use App\Http\Resources\ArsipResource;
use App\Model\Arsip;
use App\Model\ArsipDetail;
use App\Repositories\QueryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function chart(Request $request)
    {
        $data = QueryRepository::joinArsip()
            ->selectRaw('count(*) as value, cat_name as label')
            ->groupBy('cat_name');
        return $data->get();
    }
}
