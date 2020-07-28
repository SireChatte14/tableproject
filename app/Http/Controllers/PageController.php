<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * curl --user admin:admin localhost/project/api/v1/pages
     */

    public function index() {

        $pages = Page::all();;

        return Response::json(array(
            'status' => 'success',
            'pages' => $pages->toArray()),
            200
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     * curl --user admin:admin -d 'title=sample&slug=abc' localhost/project/api/v1/pages
     */

    public function store() {

        // add some validation also
        $input = Input::all();

        $page = new Page;

        if ( $input['title'] ) {
            $page->title =$input['title'];
        }
        if ( $input['slug'] ) {
            $page->slug =$input['slug'];
        }

        $page->save();

        return Response::json(array(
            'error' => false,
            'pages' => $page->toArray()),
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     * curl --user admin:admin localhost/project/api/v1/pages/2
     */

    public function show($id) {

        $page = Page::where('id', $id)
            ->take(1)
            ->get();

        return Response::json(array(
            'status' => 'success',
            'pages' => $page->toArray()),
            200
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     * curl -i -X PUT --user admin:admin -d 'title=Updated Title' localhost/project/api/v1/pages/2
     */

    public function update($id) {

        $input = Input::all();

        $page = Page::find($id);

        if ( $input['title'] ) {
            $page->title =$input['title'];
        }
        if ( $input['slug'] ) {
            $page->slug =$input['slug'];
        }

        $page->save();

        return Response::json(array(
            'error' => false,
            'message' => 'Page Updated'),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     * curl -i -X DELETE --user admin:admin localhost/project/api/v1/pages/1
     */

    public function destroy($id) {
        $page = Page::find($id);

        $page->delete();

        return Response::json(array(
            'error' => false,
            'message' => 'Page Deleted'),
            200
        );
    }
}
