<?php

use App\Models\Shio;
use App\Models\Pasaran;
use App\Models\Prediksi;
use Carbon\Carbon;

if (!function_exists("randomPasaran")) {
    function randomPasaran() {
        $pasaran = Pasaran::get();

        foreach ($pasaran as $item) {
            $nomor = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);

            /**
             * Untuk Top 4D
             */
            $top4D = str_split(Str::substr($nomor, 2), 1);
            $n2 = Str::substr($nomor, 0, 2);
            $top4D = collect(pertemuan($top4D, 2))->map(fn($e) => $n2.$e)->join("*");

            /**
             * Untuk Top 3D
             */
            $top3D = str_split(Str::substr($nomor, 1), 1);
            $n1 = Str::substr($nomor, 0, 1);
            $top3D = collect(pertemuan($top3D, 2))->map(fn($e) => $n1.$e)->join("*");

            /**
             * Untuk Top 2D
             */
            $top2D = str_split($nomor, 1);
            $top2D = collect(pertemuan($top2D, 2))->join("*");

            $prediksi = Prediksi::where("pasaran_id", $item->id)->whereDate("created_at", Carbon::now())->first();
            if (!$prediksi) {
                $prediksi = new Prediksi;
                $prediksi->pasaran_id = $item->id;
            }

            $prediksi->angka_main = $nomor;
            $prediksi->top_4d = $top4D;
            $prediksi->top_3d = $top3D;
            $prediksi->top_2d = $top2D;
            $prediksi->colok_bebas = Str::substr($nomor, 1, 1)." / ".Str::substr($nomor, -1, 1);
            $prediksi->colok_2d = Str::substr($nomor, 2, 2)." / ".Str::substr($nomor, 1, 2);
            $prediksi->shio_jitu = Shio::where("angka", "like", "%".Str::substr($nomor, 2, 2)."%")->first()->name;

            $prediksi->save();
        }

    }
}

if (!function_exists("pertemuan")) {
    function pertemuan($data, $length) {
        $res = collect(range(0, $length-1))->map(fn($e) => $data)->reduce(function ($a, $b, $i) {
            if(count($a) == 0) {
                $a[] = $b;
            }else{
                $before = $a[$i-1];
                $after = isset($a[$i+1]) ? $a[$i+1] : $a[0];
                $x = collect($before)->map(fn($e) => collect($after)->map(fn($f) => $e.$f))->collapse();
                $a[] = $x;
            }
            return $a;
        }, []);
        $res = collect($res)->collapse()->filter(fn($e) => Str::length($e) == $length)->values();

        $res = collect($res)->filter(function($e) use($data) {
            $arr = collect(str_split($e, 1));
            $datax = $arr->reduce(function($a, $b, $i) use($arr) {
                $hsl = [
                    "nomor" => $b,
                    "length" => collect($arr)->filter(fn($x) => $x == $b)->count()
                ];
                $cek = collect($a)->where("nomor", $b)->first();
                if(!$cek) $a[] = $hsl;

                return $a;
            }, []);

            $datax = collect($datax)->map(function($f) use($data) {
                $a = collect($data)->filter(fn($g) => $g == $f['nomor'])->count();

                return $a >= $f["length"];
            });
            return !in_array(false, $datax->toArray());
        })->unique()->values();

        return $res;
    }
}
