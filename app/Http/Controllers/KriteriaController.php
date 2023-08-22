<?php

namespace App\Http\Controllers;

use DB;
use App\Models\{Kriteria, User};
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kriteria()
    {
        $kriterias = Kriteria::all();
        return view('user.kriteria.index', compact('kriterias'), [
            'title' => 'Data Kriteria'
        ]);
    }

    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'), [
            'title' => 'Data Kriteria'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.create', [
            'title' => 'Tambah Kriteria'
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
            'nama_kriteria' => 'required',
            'kode' => 'required',
            'atribute' => 'required'
            
        ]);

        $kriteria = Kriteria::create([
            'nama_kriteria' => $request->nama_kriteria,
            'kode'     => $request->kode,
            'atribute'     => $request->atribute
        ]);

        if($kriteria){
            //redirect dengan pesan sukses
            alert()->success('success','Data Berhasil Disimpan!');
            return redirect()
                ->route('datakriteria.index');
                
        }else{
            //redirect dengan pesan error
            alert()->error('error','Data Gagal Disimpan!');
            return redirect()
                ->route('datakriteria.index')
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
        $kriteria = kriteria::findOrFail($id);
        return view('kriteria.edit', compact('kriteria'), [
            'title' => 'Edit Kriteria'
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
            'nama_kriteria' => 'required',
            'kode' => 'required',
            'atribute' => 'required'
        ]);

        //get data Kriteria by ID
        $kriteria = Kriteria::findOrFail($id);

            $kriteria->update([
                'nama_kriteria' => $request->nama_kriteria,
                'kode' => $request->kode,
                'atribute'     => $request->atribute
            ]);

        if($kriteria){
            //redirect dengan pesan sukses
            alert()->success('success','Data Berhasil Disimpan!');
            return redirect()
            ->route('datakriteria.index');
        
        }else{
            //redirect dengan pesan error
            alert()->error('error','Data Gagal Disimpan!');
            return redirect()
            ->route('datakriteria.index');
            
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
        $kriteria = Kriteria::findOrFail($id);
        DB::table('sub_kriterias')->where('kriteria_id', $id)->delete();
        DB::table('nilais')->where('kriteria_id', $id)->delete();
        DB::table('bobots')->where('kriteria_id', $id)->delete();
        $kriteria->delete();

        if($kriteria){
            //redirect dengan pesan sukses
            alert()->success('success','Data Berhasil Dihapus!');
            return redirect()
            ->route('datakriteria.index');
            
        }else{
            //redirect dengan pesan error
            alert()->error('error','Data Gagal Dihapus!');
            return redirect()
            ->route('datakriteria.index');
        }
    }
}
