<?php 
    
namespace App\Library;

class Locale {
    static function numberFormat($number, $decimal = null, $decimalSepartor = null , $thousandSeparator = null) {
        if (!$decimal) {
            $decimal = env('locale.decimal', 2);
        }
        
        if (!$decimalSepartor) {
            $decimalSepartor = env('locale.decimalSeparator', '.');
        }
        
        if (!$thousandSeparator) {
            $thousandSeparator = env('locale.thousandSeparator', ',');
        }
        
        return number_format($number, $decimal, $decimalSepartor, $thousandSeparator);
    }
    
    static function numberValue($number, $decimal = null, $decimalSepartor = null , $thousandSeparator = null) {
        if (!$decimal) {
            $decimal = env('locale.decimal', 2);
        }
        if (!$decimalSepartor) {
            $decimalSepartor = env('locale.decimalSeparator', '.');
        }
        if (!$thousandSeparator) {
            $thousandSeparator = env('locale.thousandSeparator', ',');
        }
        $parse = explode($decimalSepartor, $number);
        $value = str_replace($thousandSeparator, '', $parse[0]);
        if (isset($parse[1])) {
            $value .= '.'.$parse[1];
        }
        if (!is_numeric($value)) {
        	return 0;
        }
        return $value;
    }

	static function humanDate($timestamp, $format = null) {
		$timestamp = strtotime($timestamp);
		if ($time = $timestamp) {
			$y = date('Y', $time);
			$m = self::tt('month_' . date('m', $time));
			$d = date('d', $time);
			if (!$format) {
				$humanDate = '{d} {m} {Y}';
			} else {
				$humanDate = $format;
			}
			$humanDate = str_replace(array('{Y}', '{m}', '{d}'), array($y, $m, $d), $humanDate);
			return $humanDate;
		} else {
			return null;
		}
	}

	static function humanDateTime($timestamp, $format = null) {
		$timestamp = strtotime($timestamp);
		if ($time = $timestamp) {
			$y = date('Y', $time);
			$m = self::tt('month_' . date('m', $time));
			$d = date('d', $time);
			$H = date('H', $time);
			$i = date('i', $time);
			$s = date('s', $time);
			if (!$format) {
				$humanDate = '{d} {m} {Y} {H}:{i}';
			} else {
				$humanDate = $format;
			}
			$humanDate = str_replace(array('{Y}', '{m}', '{d}', '{H}', '{i}', '{s}'), array($y, $m, $d, $H, $i, $s), $humanDate);
			return $humanDate;
		} else {
			return null;
		}
	}

    static function tt($data) {
        $string = [];
        $string = [
            'month_01' => 'Januari',
            'month_02' => 'Februari',
            'month_03' => 'Maret',
            'month_04' => 'April',
            'month_05' => 'Mei',
            'month_06' => 'Juni',
            'month_07' => 'Juli',
            'month_08' => 'Agustus',
            'month_09' => 'September',
            'month_10' => 'Oktober',
            'month_11' => 'November',
            'month_12' => 'Desember'
        ];
        return $string[$data];
    }
}
?>