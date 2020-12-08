<?php

namespace App\Http\Controllers;

use App\PKriteria;
use Illuminate\Http\Request;

class PKriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $data = Kriteria::all()->where('user_id', '=', Auth::user()->id);
        $nilai = PKriteria::all();
        return view('pkriteria.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = PKriteria::all();
        return view('pkriteria.add', compact('data'));
    }

    public function store(Request $request)
    {
        $model = new PKriteria();

        // $model->id_kriteria_1 = $request->id_kriteria_1;
        // $model->id_kriteria_2 = $request->id_kriteria_2;
        // $model->nilai = $request->nilai;

        // try {
        //     $model->save();
        // } catch (\Exception $e) {
        //     return $e->getMessage();
        // }

        $nilai = $request->nilai;
        if ($nilai[0] != $nilai[2]) {
            //     $model->id_kriteria_1 = $request->id_kriteria_2;
            //     $model->id_kriteria_2 = $request->id_kriteria_1;
            //     $model->nilai = $nilai[2].'/'.$nilai[0];
            //     $model->save();
            \DB::table('nilai_kriteria')->insert([
                [
                    'id_kriteria_1' => $request->id_kriteria_1,
                    'id_kriteria_2' => $request->id_kriteria_2,
                    'nilai' => $nilai
                ],
                [
                    'id_kriteria_1' => $request->id_kriteria_2,
                    'id_kriteria_2' => $request->id_kriteria_1,
                    'nilai' => $nilai[2] . '/' . $nilai[0]
                ],
            ]);
        } else {
            $model->id_kriteria_1 = $request->id_kriteria_1;
            $model->id_kriteria_2 = $request->id_kriteria_2;
            $model->nilai = $request->nilai;

            $model->save();
        }


        return redirect()
            ->back()
            ->with('sukses', 'Penilaiaan Kriteria Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(PKriteria $pkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $pkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(PKriteria $pkriteria)
    {
        return view('kriteria.add', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $pkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PKriteria $pkriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $pkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(PKriteria $pkriteria)
    {
        $rk = PKriteria::findOrFail($pkriteria->id);
        $rk->delete();

        return redirect()->route('kriteria.index');
    }
}
