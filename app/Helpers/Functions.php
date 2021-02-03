<?php

namespace App\Helpers;

class OptionsHelper
{
    /**
     * Private constructor, `new` is disallowed by design.
     */
    private function __construct()
    {
    }

    public function nilai(int $a, int $b)
    {
        $nilai = \DB::table('nilai_kriteria')->select('nilai')
            // ->where('user_id','=', Auth::user()->id)
            ->where('id_kriteria_1', '=', $a)
            ->where('id_kriteria_2', '=', $b)
            ->first()
            ->nilai;

        return $nilai;
    }
}
