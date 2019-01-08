<?php

Class Dateid {

    public function date_encode($string) {
        $exp = explode(" ", $string);
        $exd = explode("-", $exp[0]);
        return $exd[2] . " " . $this->month_encode($exd[1]) . " " . $exd[0];
    }

    public function date_decode() {
        
    }
    
    public function day_encode($l) {
        $day = "";
        
        if ($l == "Sunday") {
            $day = "Minggu";
        } else if ($l == "Monday") {
            $day = "Senin";
        } else if ($l == "Tuesday") {
            $day = "Selasa";
        } else if ($l == "Wednesday") {
            $day = "Rabu";
        } else if ($l == "Thursday") {
            $day = "Kamis";
        } else if ($l == "Friday") {
            $day = "Jumat";
        } else if ($l == "Saturday") {
            $day = "Sabtu";
        } 
        return $day;
    }

    public function month_encode($string) {
        $month = "";

        if ($string == 1) {
            $month = "Januari";
        } else if ($string == 2) {
            $month = "Februari";
        } else if ($string == 3) {
            $month = "Maret";
        } else if ($string == 4) {
            $month = "April";
        } else if ($string == 5) {
            $month = "Mei";
        } else if ($string == 6) {
            $month = "Juni";
        } else if ($string == 7) {
            $month = "Juli";
        } else if ($string == 8) {
            $month = "Agustus";
        } else if ($string == 9) {
            $month = "September";
        } else if ($string == 10) {
            $month = "Oktober";
        } else if ($string == 11) {
            $month = "November";
        } else if ($string == 12) {
            $month = "Desember";
        }

        return $month;
    }

}
