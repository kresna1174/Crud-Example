<?php

namespace App\Models;

class MetodePembayaran
{
    public function data() {
        return [
            null => 'pilih',
            'alfamart' => 'Alfamart',
            'indomart' => 'Indomart',
            'mandiri' => 'Bank Mandiri',
            'bri' => 'Bank BRI',
            'bni' => 'Bank BNI',
            'jatim' => 'Bank JATIM',
        ];
    }
}
