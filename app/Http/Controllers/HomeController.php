<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $towns = Point::select('PostTown')->distinct()->orderBy('PostTown', 'asc')->get();
        $user = Auth::user();
        if($user != '1') {
            $user = '0';
        }

        return view('main', compact(
            'user',
            'towns'
        ));
        
    }
    


}
