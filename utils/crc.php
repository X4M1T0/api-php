<?php

    // FUNÇÃO DE CÁLCULO DE CRC - MODELO CCITT
    function calc_crc_ccitt(string $data): string {
        $crc = 0xFFFF; // Valor inicial padrão do CRC-CCITT
        $poly = 0x1021; // Polinômio CRC-CCITT

        $length = strlen($data);

        for ($i = 0; $i < $length; $i++) {
            $crc ^= (ord($data[$i]) << 8);
            for ($j = 0; $j < 8; $j++) {
                if (($crc & 0x8000) !== 0) {
                    $crc = ($crc << 1) ^ $poly;
                } else {
                    $crc <<= 1;
                }
                $crc &= 0xFFFF; // Garante que continue 16 bits
            }
        }

        // Retorna em hexadecimal com 4 dígitos
        return strtoupper(str_pad(dechex($crc), 4, '0', STR_PAD_LEFT));
    }

?>
