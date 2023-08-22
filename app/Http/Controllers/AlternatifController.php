<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use DB;
Use DataTables;
use App\Models\{Alternatif, SubKriteria, Kriteria, Nilai, User};
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alternatif()
    {
        $alternatifs = Alternatif::join('nilais', 'nilais.alternatif_id', '=', 'alternatifs.id')->join('kriterias', 'kriterias.id', '=', 'nilais.kriteria_id')->count('kriteria_id');
        $alternatif = Alternatif::all();
        $sub_kriterias = Nilai::join('sub_kriterias', 'sub_kriterias.kriteria_id', '=', 'nilais.kriteria_id')->get();
        return view('user.alternatif.index', compact('alternatifs', 'sub_kriterias','alternatif'), [
            'title' => 'Data Alternatif'
        ]);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $nilai= Nilai::all();
        $alternatif = Alternatif::all();
        $kriterias = Kriteria::all();
        $sub_kriterias = Nilai::join('sub_kriterias', 'sub_kriterias.nilai', '=', 'nilais.nilai')->get();
        return view('alternatif.index', compact('kriterias','nilai', 'alternatif','sub_kriterias'), [
            'title' => 'Data Alternatif'
        ]);
    }

    public function getdata($id)
    {
        $nilais = DB::table('nilais')
        ->join('alternatifs', 'alternatifs.id','=', 'nilais.alternatif_id')
        ->join('kriterias', 'kriterias.id', '=','nilais.kriteria_id')
        ->where('alternatif_id', '=', $id)
        ->get();
    
        return view ('alternatif.modal', compact('nilais'), [
            'title' => 'Data Alternatif'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriterias = Kriteria::all();
        $sub_kriterias = Kriteria::join('sub_kriterias', 'sub_kriterias.kriteria_id', '=', 'kriterias.id')->get();
        return view('alternatif.create', compact('kriterias','sub_kriterias'), [
            'title' => 'Tambah Alternatif'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('alternatifs')->insert([
            'nama_alt' => $request->nama_alt,
            'kode' => $request->kode
        ]);

        $getid = DB::table('alternatifs')->orderBy('id', 'desc')->first();

        $length = count($request->kriteria) + 1;
        for ($i = 1; $i < $length; $i++) {
            DB::table('nilais')->insert([
                'alternatif_id' => $getid->id,
                'kriteria_id' => "$i",
                'nilai' => $request->kriteria[$i - 1],
            ]);
        }
        alert()->success('success', 'New alternative added');

        return redirect()->route('alternatif.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_kriterias = Kriteria::join('sub_kriterias', 'sub_kriterias.kriteria_id', '=', 'kriterias.id')->get();
        $countNilai = SubKriteria::where('kriteria_id', '=', $id)->join('kriterias', 'kriterias.id', '=', 'sub_kriterias.kriteria_id')->count('klasifikasi');
        $alternatif = Alternatif::find($id);
        $kriterias = Kriteria::all();
        $nilais = Nilai::where('alternatif_id', '=', $id)->join('kriterias', 'kriterias.id', '=', 'nilais.kriteria_id')->get();
        
        return view('alternatif.edit', compact('kriterias','alternatif','nilais', 'countNilai','sub_kriterias'), [
            'title' => 'Edit Alternatif'
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
        DB::table('alternatifs')->where('id', $request->id)->update([
            'nama_alt' => $request->nama_alt,
            'kode' => $request->kode
            ]);

            $length = count($request->kriteria) + 1;

            for ($i = 1; $i < $length; $i++) {
                DB::table('nilais')->where('alternatif_id', $request->id)->where('kriteria_id', $i)->update([
                    'nilai' => $request->kriteria[$i - 1],
                ]);
            }

        alert()->success('Congrats', 'Alternatif updated');

        return redirect(route('alternatif.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('nilais')->where('alternatif_id', $id)->delete();
        DB::table('alternatifs')->where('id', $id)->delete();

        alert()->success('Warning', 'Alternatif deleted');
         return redirect()->back();
    }
}
