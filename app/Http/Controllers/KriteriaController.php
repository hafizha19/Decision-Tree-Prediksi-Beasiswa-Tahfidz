<?php

namespace App\Http\Controllers;

use App\Kriteria;
use App\PKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KriteriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kriteria::all()->where('user_id', '=', Auth::user()->id);
        $nilai = PKriteria::all();
        return view('kriteria.index', compact(['data', 'nilai']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Kriteria();

        $model->nama = $request->nama;
        $model->user_id = $request->user_id;

        if ($model::where('user_id', '=', Auth::user()->id)->count() < 3) {
            $model->save();
        } else {
            return back()->withError('Kriteria Maksimal 3')->withInput();
        }

        return redirect()->route('kriteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.add', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        $rk = Kriteria::findOrFail($kriteria->id);
        $rk->delete();

        return redirect()->route('kriteria.index');
    }
}
