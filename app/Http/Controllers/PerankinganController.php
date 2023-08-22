<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\{Kriteria, Alternatif, User, Bobot, Hasil};
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PerankinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function coba()
    {
        $alternatifs = Alternatif::all();
        $normal = Helper::valNormal();
        $matrix = Helper::valMatrix();
        $alternatif = Helper::getAlternatif();
        $bobotprefensi = Helper::bobotprefensi();
        $optim = Helper::valOptim();
        $yimin = Helper::valYimin();
        $yimax = Helper::valYimax();
        $bobot = Helper::total();
        $yi = Helper::hasil();

        $rank = 1;

        return view('perankingan.coba',compact('bobot', 'bobotprefensi','yi', 'yimin', 'yimax','normal','optim','matrix', 'alternatif', 'rank', 'alternatifs'), [
            'title' => 'Perankingan'
        ]);
    }

    public function hasil()
    {
        $alternatifs = Alternatif::all();
        $normal = Helper::valNormal();
        $matrix = Helper::valMatrix();
        $alternatif = Helper::getAlternatif();
        $optim = Helper::valOptim();
        $yimin = Helper::valYimin();
        $yimax = Helper::valYimax();
        $yi = Helper::hasil();

        $rank = 1;

        return view('perankingan.hasil',compact('yi', 'yimin', 'yimax','normal','optim','matrix','rank', 'alternatif', 'alternatifs'), [
            'title' => 'Perankingan'
        ]);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $alternatifs = Alternatif::all();
        $alternatif = Alternatif::all();
        $countKriteria = Kriteria::count();
        $countBobot = Bobot::where('user_id', '=', $user_id)->join('kriterias', 'kriterias.id', '=', 'bobots.kriteria_id')->count('bobot');
        $bobot = Kriteria::join('bobots', 'bobots.kriteria_id', '=', 'kriterias.id')->where('user_id', $user_id)->get();
        $kriterias = Kriteria::all();

        return view('perankingan.index',compact('countBobot','countKriteria','bobot','kriterias','alternatifs', 'alternatif'), [
            'title' => 'Perankingan'
        ]);
    }

    public function history()
    {
        $hasil = Hasil::join('users','users.id','=', 'hasils.user_id')->get();
        
        return view('perankingan.history',compact('hasil'), [
            'title' => 'History Hasil'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function create(Request $request)
    {
        $bobot = Kriteria::join('bobots', 'bobots.kriteria_id', '=', 'kriterias.id')->where('user_id', $user_id)->get();
        DB::table('bobots')->insert([
            'user_id' => Auth::user()->id,
            'kriteria_id' => $request->id,
            'bobot' => $request->bobot,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        alert()->success('success','Data Berhasil Disimpan!');
        return redirect()->route('perankingan.index');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $bobot = Kriteria::join('bobots', 'bobots.kriteria_id', '=', 'kriterias.id')->where('user_id', $user_id)->find($request->id);
        if($bobot == null){
            DB::table('bobots')->insert([
            'user_id' => Auth::user()->id,
            'kriteria_id' => $request->id,
            'bobot' => $request->bobot,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        }else{
            DB::table('bobots')->find($request->id);
            DB::table('bobots')->where('kriteria_id', $request->id)->where('user_id', $user_id)->update([
                'bobot'     => $request->bobot
            ]);
        }
        
        alert()->success('success','Data Berhasil Disimpan!');
        return redirect()->route('perankingan.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $bobot = Kriteria::join('bobots', 'bobots.kriteria_id', '=', 'kriterias.id')->where('user_id', $user_id)->get();
        $kriterias = Bobot::findOrFail($id);
        $kriteria = Kriteria::all();
        return view('perankingan.edit', compact('kriteria','kriterias', 'bobot'), [
            'title' => 'Edit Bobot'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('bobots')->find($request->id);
            DB::table('bobots')->where('kriteria_id', $request->id)->update([
                'bobot'     => $request->bobot
            ]);
            alert()->success('success','Data Berhasil Disimpan!');
            return redirect()->route('perankingan.index');
            
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
