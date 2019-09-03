<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArsipDetailResource;
use App\Http\Resources\ArsipResource;
use App\Model\Arsip;
use App\Model\ArsipDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Validation\ValidationException
     */
    public function filter(Request $request)
    {
        $this->validate($request, [
           "year_month" => "required",
        ]);
        $yearMonth = $request->year_month;
        $noBku = $request->no_bku;
        $uraian = $request->uraian;
        $data = false;
        if($yearMonth){
            $explode = explode("-", $yearMonth);
            $month = $explode[1];
            $year = $explode[0];
            $data = Arsip::sortByPeriode($month, $year)
                ->with('rincian');
        }
        if($noBku && $data){
            $data = $data->where("arsip_no_bku", $noBku);
        }

        $data = $data->get();

        return ArsipResource::collection($data);
    }

    public function filterUraian($uraian)
    {
        $data = ArsipDetail::where("ad_uraian", "like", "%$uraian%");
        $data = $data->get();

        return ArsipDetailResource::collection($data);
    }
}
