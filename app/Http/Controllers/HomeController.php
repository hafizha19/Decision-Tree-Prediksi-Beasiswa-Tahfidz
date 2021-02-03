<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->getData();

        // Get the highest gain
        $tree = collect($data['attributes'])->sortBy('gain')->reverse()->toArray();

        return view('home', compact('tree', 'data'));
    }

    public function getAttributes()
    {
        $attributes = ['ipk', 'bea_lain', 'sktm', 'hafalan', 'prestasi'];
        return $attributes;
    }

    public function getTipeAttributes($attribute)
    {
        $att[$attribute] = \DB::table('data')->groupBy($attribute)->pluck($attribute)->toArray();
        // }
        return $att[$attribute];
    }

    public function getData()
    {
        $status = [0, 1];
        $attributes = $this->getAttributes();
        foreach ($attributes as $a) {
            $type[$a] = $this->getTipeAttributes($a);
        }

        foreach ($status as $s) {
            foreach ($attributes as $attribute) {
                foreach ($type[$attribute] as $at) {
                    $data['attributes'][$attribute][$at][$s] = \DB::table('data')
                        ->where('status', '=', $s)
                        ->where($attribute, '=', $at)
                        ->count();

                    if (isset($data['attributes'][$attribute][$at]['jumlah'])) {
                        $data['attributes'][$attribute][$at]['jumlah'] = $data['attributes'][$attribute][$at]['jumlah'];
                    } else {
                        $data['attributes'][$attribute][$at]['jumlah'] = 0;
                    }
                    $data['attributes'][$attribute][$at]['jumlah'] += $data['attributes'][$attribute][$at][$s];
                }
            }
            $data['jumlah'][$s] = \DB::table('data')
                ->where('status', '=', $s)
                ->count();
        }

        // set entropy
        foreach ($attributes as $att) {
            $tipe[$att] = $this->getTipeAttributes($att);

            // sisi kiri - kanan (lihata entropy)
            foreach ($tipe[$att] as $t) {
                $nilai = [];
                foreach ($status as $s) {
                    array_push($nilai, $data['attributes'][$att][$t][$s]);
                }
                $data['attributes'][$att][$t]['entropy'] = $this->entropy($nilai);
            }
        }

        // set gain
        foreach ($attributes as $a) {
            $arr = [];
            foreach ($type[$a] as $t) {
                $sum = $data['attributes'][$a][$t]['entropy'] * $data['attributes'][$a][$t]['jumlah'] / array_sum($data['jumlah']);
                array_push($arr, $sum);
            }
            // var_dump($arr['ipk']);
            $gain = $this->entropy($data['jumlah']) - array_sum($arr);
            $data['attributes'][$a]['gain'] = $gain;
        }

        return $data;
    }

    public function entropy(array $status)
    {
        $n = $status[0];
        $y = $status[1];
        $sum_values = $n + $y;

        $sisi_n = - ($n) * log($n / $sum_values, 2) / $sum_values;
        $sisi_y = - ($y) * log($y / $sum_values, 2) / $sum_values;

        if (is_nan($sisi_n + $sisi_y)) {
            $entropy = 0;
        } else {
            $entropy = $sisi_n + $sisi_y;
        }
        return $entropy;
    }

    // public function getData2()
    // {
    //     $status = [0, 1];
    //     $attributes = $this->getAttributes();
    //     foreach ($attributes as $a) {
    //         $type[$a] = $this->getTipeAttributes($a);
    //     }

    //     $data = $this->getData();

    //     // Get the highest gain
    //     $tree = collect($data['attributes'])->sortBy('gain')->reverse()->toArray();
    //     reset($tree);
    //     $root = key($tree);

    //     foreach ($status as $s) {
    //         foreach ($attributes as $attribute) {
    //             if ($attribute == $root) {
    //                 continue;
    //             }
    //             foreach ($type[$attribute] as $at) {
    //                 $data2['attributes'][$attribute][$at][$s] = \DB::table('data')
    //                     ->where('status', '=', $s)
    //                     ->where($attribute, '=', $at)
    //                     ->count();

    //                 if (isset($data2['attributes'][$attribute][$at]['jumlah'])) {
    //                     $data2['attributes'][$attribute][$at]['jumlah'] = $data2['attributes'][$attribute][$at]['jumlah'];
    //                 } else {
    //                     $data2['attributes'][$attribute][$at]['jumlah'] = 0;
    //                 }
    //                 $data2['attributes'][$attribute][$at]['jumlah'] += $data2['attributes'][$attribute][$at][$s];
    //             }
    //         }
    //         $data2['jumlah'][$s] = \DB::table('data')
    //             ->where('status', '=', $s)
    //             ->count();
    //     }

    //     // set entropy
    //     foreach ($attributes as $att) {
    //         if ($att == $root) {
    //             continue;
    //         }
    //         $tipe[$att] = $this->getTipeAttributes($att);

    //         // sisi kiri - kanan (lihata entropy)
    //         foreach ($tipe[$att] as $t) {
    //             $nilai = [];
    //             foreach ($status as $s) {
    //                 array_push($nilai, $data2['attributes'][$att][$t][$s]);
    //             }
    //             $data2['attributes'][$att][$t]['entropy'] = $this->entropy($nilai);
    //         }
    //     }

    //     // set gain
    //     foreach ($attributes as $a) {
    //         if ($a == $root) {
    //             continue;
    //         }
    //         $arr = [];
    //         foreach ($type[$a] as $t) {
    //             $sum = $data2['attributes'][$a][$t]['entropy'] * $data2['attributes'][$a][$t]['jumlah'] / array_sum($data2['attributes']);
    //             array_push($arr, $sum);
    //         }
    //         // var_dump($arr['ipk']);
    //         $gain = $this->entropy($data2['jumlah']) - array_sum($arr);
    //         $data2['attributes'][$a]['gain'] = $gain;
    //     }

    //     return $data2;
    // }
}
