<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $users
     * @return void
     */
    public function index(User $users)
    {

        $users = User::paginate(10);


        return view('admin.User.index',compact('users'));
    }
}
