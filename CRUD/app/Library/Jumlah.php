<?php

namespace App\Library;

class Jumlah 
{

    public static function data() {
        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[$i] = $i;
        }
        return $data;
    }
}
