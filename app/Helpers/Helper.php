<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Models\{Kriteria, Nilai, Alternatif, User};
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function kriteriaMenu()
    {
        $kriterias = Kriteria::all();
        return $kriterias;
    }

    public static function getbobot()
    {
        $user_id = Auth::user()->id;
        $bobot = DB::table('bobots')->where('user_id', $user_id)->get();
        
        $array = json_decode(json_encode($bobot), true);
        $bobots = array();
        foreach ($array as $row) {
            $bobots[$row['kriteria_id']] = array($row['bobot']);
        }
        return $bobots;
    }

    public static function bobot()
    {
        $bobot = Helper::getbobot();

        $nilai = 0;
        foreach ($bobot as $bobot_id => $b){
            $nilai += $b[0];
        }

        return $nilai;
    }

    public static function bobotprefensi()
    {
        $nilai = Helper::bobot();
        $bobot = Helper::getKriteria();

        $bobots = $bobot;
        foreach ($bobot as $bobot_id => $b){
            $bobots[$bobot_id] =  ($b[2]/$nilai);
        }

        return $bobots;
    }

    public static function total()
    {
        $totalbobot = Helper::bobotprefensi();
        $bobot = Helper::getKriteria();

        $bobots = 0;
        foreach ($totalbobot as $bobot_id => $b){
            $bobots += $b;
        }

        return $bobots;
    }

    public static function getKriteria() 
    {
        $user_id = Auth::user()->id;
        // $getCriteria = Criteria::all();
        $getKriteria = DB::table('kriterias')->join('bobots', 'bobots.kriteria_id', '=', 'kriterias.id')->where('user_id', $user_id)->get();
        $arrayKriteria = json_decode(json_encode($getKriteria), true);
        $kriteria = array();

        foreach ($arrayKriteria as $row) {
            $kriteria[$row['kriteria_id']] = array($row['nama_kriteria'], $row['atribute'], $row['bobot']);
        }

        return $kriteria;
    }

    public static function getAlternatif()
    {
        // $getAlternatif = Alternatif::all();
        $getAlternatif = DB::table('alternatifs')->get();
        $arrayAlternatif = json_decode(json_encode($getAlternatif), true);
        $alternatif = array();

        foreach ($arrayAlternatif as $row) {
            $alternatif[$row['id']] = array(
                $row['nama_alt'],
                $row['kode']
            );
        }

        return $alternatif;
    }

    public static function valMatrix()
    {
        $result = Nilai::all();
        $valMatrix = array();

        foreach ($result as $score) {
            $alternatif = $score['alternatif_id'];
            $kriteria = $score['kriteria_id'];
            $val = $score['nilai'];

            $valMatrix[$alternatif][$kriteria] = $val;
        }
        return $valMatrix;
    }

    public static function valNormal()
    {
        $kriteria = Helper::getKriteria();
        $alternatif = Helper::getAlternatif();
        $matrix = Helper::valMatrix();

        $normal = $matrix;
        foreach ($kriteria as $kriteria_id => $c) {
            //-- inisialisasi nilai pembagi tiap kriteria
            $divider = 0;
            foreach ($alternatif as $alternatif_id => $a) {
                $divider += pow($matrix[$alternatif_id][$kriteria_id], 2);
            }
            foreach ($alternatif as $alternatif_id => $a) {
                $normal[$alternatif_id][$kriteria_id] /= sqrt($divider);
            }
        }

        return $normal;
    }

    public static function valOptim()
    {
        $nilai = Helper::bobot();
        $kriteria = Helper::getKriteria();
        $alternatif = Helper::getAlternatif();
        $normal = Helper::valNormal();

        $optim = $normal;
        foreach ($kriteria as $kriteria_id => $c) {
            //-- inisialisasi nilai pembagi tiap kriteria
            $op = array();
            foreach ($alternatif as $alternatif_id => $a) {
                $op[$alternatif_id] = $normal[$alternatif_id][$kriteria_id] * ($c[2] / $nilai);
            }
            foreach ($alternatif as $alternatif_id => $a) {
                $optim[$alternatif_id][$kriteria_id] = $op[$alternatif_id];
            }
        }

        return $optim;
    }

    public static function valYimax()
    {
        $kriteria = Helper::getKriteria();
        $alternatif = Helper::getAlternatif();
        $optim = Helper::valOptim();

        $yimax = array();
        foreach ($alternatif as $alternatif_id => $a) {
            $yimax[$alternatif_id] = 0;
            foreach ($kriteria as $kriteria_id => $c) {
                if($c[1] == 'Benefit'){
                    $yimax[$alternatif_id] += $optim[$alternatif_id][$kriteria_id];
                }
                else {
                    $yimax[$alternatif_id] -= 0;
                }
            }

        }
        return $yimax;
    }

    public static function valYimin()
    {
        $kriteria = Helper::getKriteria();
        $alternatif = Helper::getAlternatif();
        $optim = Helper::valOptim();

        $yimin = array();
        foreach ($alternatif as $alternatif_id => $a) {
            $yimin[$alternatif_id] = 0;
            foreach ($kriteria as $kriteria_id => $c) {
                if($c[1] == 'Cost'){
                    $yimin[$alternatif_id] += $optim[$alternatif_id][$kriteria_id];
                }
                else {
                    $yimin[$alternatif_id] -= 0;
                }
            }
            
        }
        return $yimin;
    }

    public static function valYI()
    {
        $kriteria = Helper::getKriteria();
        $alternatif = Helper::getAlternatif();
        $yimin = Helper::valYimin();
        $yimax = Helper::valYimax();
        
        $YI = array();
        foreach ($alternatif as $alternatif_id => $a) {
            $YI[$alternatif_id] = 0;
            $YI[$alternatif_id] = $yimax[$alternatif_id] - $yimin[$alternatif_id];
        }
        return $YI;
    }

    public static function hasil()
    {
        $yi = Helper::valYI();
         //--mengurutkan data secara descending dengan tetap mempertahankan key/index array-nya
         arsort($yi);
         //-- mendapatkan key/index item array yang pertama
         $index = key($yi);
         
         return $yi;
    }
}