<?php

namespace App\Http\Controllers;

use App\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{

    public function index()
    {
       $data = Cache::get('cache_menu', function () {
            return Menu::where('parent_id', 0)->with('childrenRecursive')->get();
        });
        return $data;
    }

    public function show(Menu $menu)
    {
        return $menu;
    }

    public function store(Request $request)
    {
        Cache::flush();
        $db = new Menu();
        $db->parent_id = $request->parent_id != null ?  $request->parent_id  : 0;
        $db->menu_link = $request->menu_link;
        $db->menu_name = $request->menu_name;
        $db->type = $request->type;
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
        Cache::flush();
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
        Cache::flush();
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
        Menu::truncate();
        Cache::flush();
        $id = 0;
        foreach ($request->menu as $indexParent => $menu) {
            $menu_id = $this->saveOrderRequest($request, $menu, $id);
            $children = $menu['children_recursive'];
            if ($children && count($children)) {
                foreach ($children as $index => $child) {
                    $this->saveOrderRequest($request, $child, $menu_id);
                }
            }
        }
    }
}
