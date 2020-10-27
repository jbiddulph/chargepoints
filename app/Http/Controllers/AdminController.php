<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use Auth;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function main()
    {
        return view('home');
    }

    public function points()
    {
        $towns = Point::select('PostTown')->distinct()->orderBy('PostTown', 'asc')->get();
        $user = Auth::user();
        return view('welcome', compact(
            'user',
            'towns'
        ));
    }


}
