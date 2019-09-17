<?php

namespace App\Http\Controllers;

use App\Model\Menu;
use App\Repositories\QueryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{

    public function index()
    {
        $menu = QueryRepository::menu()->first();
        return $menu->value;
    }

    public function show(Menu $menu)
    {
        return $menu;
    }

    public function store(Request $request)
    {
        $db = QueryRepository::menu()->first();
        $db->value = $request->menu;
        $db->save();
        return responseJson('Menu berhasil ditambahkan');    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $db = $menu;
        $db->parent_id = $request->parent_id != null ?  $request->parent_id  : 0;
        $db->menu_link = $request->menu_link;
        $db->menu_name = $request->menu_name;
        $db->type = $request->type;
        $db->save();
        return responseJson('Menu berhasil diupdate');
    }


    public function destroy(Menu $menu)
    {
        $menu->delete();
        return responseJson('Menu berhasil dihapus');
    }

    public function saveOrderRequest($request, $v, $id)
    {
        $db = new Menu;
        $db->parent_id = $id;
        $db->menu_link = $v['menu_link'];
        $db->menu_name = $v['menu_name'];
        $db->type = $v['type'];
        $db->save();
        $id = $db->menu_id;
        return $id;
    }

    public function setOrder(Request $request)
    {
        $db = QueryRepository::menu()->first();
        $db->value = json_encode($request->menu);
        $db->save();
        return responseJson("Menu berhasil disimpan");
    }
}
