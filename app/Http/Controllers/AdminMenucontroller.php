<?php

namespace App\Http\Controllers;

use App\menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMenucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param menu $menus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(menu $menus)
    {
        return view('admin.MenuEdit.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view ('admin.MenuEdit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $data = $this ->_validate($request);

        menu::create($data);

        Alert::success('Das neue Gericht wurde hinzugefügt');

        return redirect(route('admin.MenuEdit.index'));

    }

    private function _validate($request) {

        $rules = [
            'title'         =>  'required|string',
            'categorieID'   =>  'required|string',
            'description'   =>  'required|string',
            'price'         =>  'required|string',
        ];
        return $this->validate($request, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show(){


       // return view('menu',compact('menus'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param menu $menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($menu) {

        $menu = menu::findOrFail($menu);

        return view('admin.MenuEdit.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param menu $menu
     * @return void
     */
    public function update(Request $request, $menu ){

        menu::where('id',$menu)
        ->update([ 'title'=> $request['title'],
                   'categorieID'=>$request['categorieID'],
                   'description'=> $request['description'],
                   'price'=> $request['price'],
        ]);

        Alert::success('Das Gericht wurde aktualisiert');

        return redirect(route('admin.MenuEdit.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param menu $menu
     * @return void
     * @throws \Exception
     */
    public function destroy($menu)
    {
        menu::where('id',$menu)
        ->delete();
        Alert::error('Das Gericht wurde gelöscht');

        return redirect(route('admin.MenuEdit.index'));
    }
}
