<?php

namespace App\Http\Controllers;

use DB;
use App\Models\{SubKriteria, Kriteria, User};
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subkriteria()
    {
        $sub_kriterias = Kriteria::join('sub_kriterias', 'sub_kriterias.kriteria_id', '=', 'kriterias.id')->orderBy('kriteria_id', 'asc')->orderBy('nilai', 'asc')->get();
        return view('user.subkriteria.index', compact('sub_kriterias'), [
            'title' => 'Data Keterangan Kriteria'
        ]);
    }
    
    public function index()
    {
        $sub_kriterias = Kriteria::join('sub_kriterias', 'sub_kriterias.kriteria_id', '=', 'kriterias.id')->orderBy('kriteria_id', 'asc')->orderBy('nilai', 'asc')->get();
        return view('subkriteria.index', compact('sub_kriterias'), [
            'title' => 'Data Keterangan Kriteria'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_kriterias = Kriteria::all();
        $kriterias = SubKriteria::all();
        return view('subkriteria.create', compact('sub_kriterias', 'kriterias'),[
            'title' => 'Tambah Keterangan Kriteria'
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
        $this->validate($request, [
            'kriteria_id' => 'required',
            'klasifikasi' => 'required',
            'nilai' => 'required'
        ]);

        $sub_kriteria = SubKriteria::create([
            'kriteria_id' => $request->kriteria_id,
            'klasifikasi' => $request->klasifikasi,
            'nilai'  => $request->nilai
        ]);

        if($sub_kriteria){
            //redirect dengan pesan sukses
            alert()->success('success','Data Berhasil Disimpan!');
            return redirect()
                ->route('subkriteria.index');
        }else{
            //redirect dengan pesan error
            alert()->error('error','Data Gagal Disimpan!');
            return redirect()
                ->route('subkriteria.index')
                ->withInput();
                
        }
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
        $data_klasifikasi = Kriteria::all();
        $sub_kriterias = Kriteria::join('sub_kriterias', 'sub_kriterias.kriteria_id', '=', 'kriterias.id')->get();
        $kriterias = SubKriteria::findOrFail($id);
        return view('subkriteria.edit', compact('sub_kriterias', 'kriterias', 'data_klasifikasi'), [
            'title' => 'Edit Klasifikasi'
        ]);
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
        $this->validate($request, [
            'kriteria_id' => 'required',
            'klasifikasi' => 'required',
            'nilai' => 'required'
        ]);

        //get data Kriteria by ID
        $sub_kriteria = SubKriteria::findOrFail($id);

        $sub_kriteria->update([
            'kriteria_id' => $request->kriteria_id,
            'klasifikasi'     => $request->klasifikasi,
            'nilai'     => $request->nilai
        ]);

        if($sub_kriteria){
            //redirect dengan pesan sukses
            alert()->success('success','Data Berhasil Disimpan!');
            return redirect()
            ->route('subkriteria.index');
            
        }else{
            //redirect dengan pesan error
            alert()->error('error','Data Gagal Disimpan!');
            return redirect()
            ->route('subkriteria.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_kriteria = SubKriteria::findOrFail($id);
        $sub_kriteria->delete();

        if($sub_kriteria){
            //redirect dengan pesan sukses
            alert()->success('success','Data Berhasil Dihapus!');
            return redirect()
            ->route('subkriteria.index');
        }else{
            //redirect dengan pesan error
            alert()->error('error','Data Gagal Dihapus!');
            return redirect()
            ->route('subkriteria.index');
        }
    }
}
