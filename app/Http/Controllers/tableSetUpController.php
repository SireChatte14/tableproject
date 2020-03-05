<?php

namespace App\Http\Controllers;


use App\table;
use Illuminate\Http\Request;

class tableSetUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param table $tables
     * @return void
     */
    public function index(table $tables)
    {
        return view('admin.TableEdit.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.TableEdit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this ->_validate($request);

        table::create($data);

        return redirect(route('admin.TableEdit.index'))->withsuccess('Der neue Tisch wurde hinzugefügt');

    }

    private function _validate($request) {

        $rules = [
            'tableNumber' => 'required|integer',
            'numberOfSeats' => 'required|integer',
        ];
        return $this->validate($request, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $table
     * @return void
     */
    public function edit($table)
    {
          $table= table::findOrFail($table);

          return view('admin.TableEdit.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
