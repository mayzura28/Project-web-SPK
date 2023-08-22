<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Alternatif, SubKriteria, Kriteria,Nilai, User};
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
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
    public function index()
    {
        $countAlternatifs = Alternatif::count();
        $countKriterias = Kriteria::count();
        $countNilais = Nilai::count();
        $countUsers = User::count();
        $countKlasifikasis = SubKriteria::count();
        
        $users = User::all();
            return view('manage.index', compact('users', 'countAlternatifs', 'countKriterias', 'countNilais', 'countUsers', 'countKlasifikasis'),[
                'users' => $users,
                'title' => 'Home'
            ]);
        
    }
    public function user()
    {
        $users = User::all();
            return view('manage.user', compact('users'),[
                'title' => 'Users'
            ]);
    }

}
