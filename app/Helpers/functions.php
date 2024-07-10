<?php

use Carbon\Carbon;

if (!function_exists('carbon')) {
    /**
     * Retornar instância de data.
     *
     * @param mixed $date
     * @return Carbon\Carbon
     */
    function carbon($date = null)
    {
        if (!empty($date)) {
            if ($date instanceof DateTime) {
                return Carbon::instance($date);
            }

            return Carbon::parse(date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date))));
        }

        return Carbon::now();
    }
}


if (!function_exists('removeMask')) {
    /**
     * Remover máscara.
     *
     * @param string $str
     * @return string
     */
    function removeMask(string $str)
    {
        return preg_replace('/[^A-Za-z0-9]/', '', $str);
    }
}

if (!function_exists('insertMask')) {
    /**
     * Remover máscara.
     *
     * @param ?string $str
     * @return string
     */
    function insertMask(?string $str, string $mask)
    {
        if (!$str) {
            return '';
        }

        $array = str_split($str);

        foreach (str_split($mask) as $char) {
            if ($char === 'A') {
                //this means we want to take the first element that's left in our alphas array and append it to output.
                if (count($array) == 0) {
                    break;
                    //just end the flow altogether - we're done here.
                }
                $output[] = array_shift($array);
            } elseif ($char === '9') {
                if (count($array) == 0) {
                    break;
                }
                $output[] = array_shift($array);
            } else {
                if (count($array) == 0) {
                    break;
                }
                $output[] = $char;
            }
        }

        return implode($output);
    }
}


if (!function_exists('floatToMoney')) {
    /**
     * Transforma float do banco em reais.
     *
     * @param string $str
     * @return string
     */
    function floatToMoney($value)
    {
        if (!$value) {
            return '0,00';
        }
        return number_format($value, 2, ',', '.');
    }
}

if (!function_exists('moneyToFloat')) {
    /**
     * Converte reais para float.
     *
     * @param string $str
     * @return string
     */
    function moneyToFloat($value)
    {
        if (!$value) return 0;

        $source = array('.', ',');
        $replace = array('', '.');
        return str_replace($source, $replace, $value);
    }
}


if (!function_exists('nifMask')) {
    /**
     * Remover máscara.
     *
     * @param string $str
     * @return string
     */
    function nifMask(string $str)
    {
        if (strlen($str) == 11) {
            $mask = '###.###.###-##';
        } else {
            $mask = '##.###.###/####-##';
        }

        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }

        return $mask;
    }
}
