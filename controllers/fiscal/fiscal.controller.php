<?php

require 'utils/crc.php';

class FiscalController {
    
    public function crc($data) {
        $response = calc_crc_ccitt($data);
        return json_encode($response);
    }

}
