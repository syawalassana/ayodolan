<?php
namespace App\Helpers;

class Ayo
{
    public static function set_active($path, $active = 'active')
    {
        return call_user_func_array('Request::is', (array) $path) ? $active : '';
    }

    public static function rupiah($num)
    {
        if ($num) {
            $hasil_rupiah = 'Rp. ' . number_format($num, 0, ',', '.');

            return $hasil_rupiah;
        }

        return 'Rp . 0';
    }
}
