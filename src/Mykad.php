<?php

/**
 * Created by PhpStorm.
 * User: Robbi <robbinespu@gmail.com>
 * Date: 4/2/17
 * Time: 12:19 AM
 */
class Mykad
{
    private	$state;
    private	$gender;
    private	$dob;
    private	$age;

    public function output($mykad, $date_format='j F Y'){
        // Strip non-numeric chars
        $ic_no = preg_replace('/[^0-9]/', '', $mykad);

        // checking mykad value not empty
        if ( ! empty($mykad))
        {   // Checking mykad length
            if (strlen($mykad) < 12 || strlen($mykad) > 12 ) return FALSE;

            // match mykad format
            $regex = "/^(\d{6})-?(\d{2})-?(\d{4})$/";
            if (!preg_match($regex, $mykad)) return false;

            $tmp_tahun = substr($mykad,0,2);
            $tmp_hari = substr($mykad,4,2);
            $tmp_bulan = substr($mykad,2,2);
            $tmp_negeri = substr($mykad,6,2);
            $tmp_jantina = substr($mykad,11,1);

            // Born on 2000 - 3000
            if($tmp_tahun >= 00 && $tmp_tahun <= 30) {
                $tmp_tahun = 2000+$tmp_tahun;
            }
            // Born on 1931 - 1999
            if($tmp_tahun >= 31 && $tmp_tahun <= 99) {
                $tmp_tahun = 1900+$tmp_tahun;
            }

            // BOD
            $this->dob = $tmp_hari."-".$tmp_bulan."-".$tmp_tahun;

            // How old are you?
            $tmp_tarikh_lahir = $tmp_tahun."-".$tmp_bulan."-".$tmp_hari;;
            $this->age = date_create($tmp_tarikh_lahir)->diff(date_create('today'))->y;

            switch ($tmp_negeri)
            {
                case '01':
                case '21':
                case '22':
                case '23':
                case '24':
                    $this->state = 'Johor';
                    break;

                case '02':
                case '25':
                case '26':
                case '27':
                    $this->state = 'Kedah';
                    break;

                case '03':
                case '28':
                case '29':
                    $this->state = 'Kelantan';
                    break;

                case '04':
                case '30':
                    $this->state = 'Melaka';
                    break;

                case '05':
                case '31':
                case '59':
                    $this->state = 'Negeri Sembilan';
                    break;

                case '06':
                case '32':
                case '33':
                    $this->state = 'Pahang';
                    break;

                case '07':
                case '34':
                case '35':
                    $this->state = 'Penang';
                    break;

                case '08':
                case '36':
                case '37':
                case '38':
                case '39':
                    $this->state = 'Perak';
                    break;

                case '09':
                case '40':
                    $this->state = 'Perlis';
                    break;

                case '10':
                case '41':
                case '42':
                case '43':
                case '44':
                    $this->state = 'Selangor';
                    break;

                case '11':
                case '45':
                case '46':
                    $this->state = 'Terengganu';
                    break;

                case '12':
                case '47':
                case '48':
                case '49':
                    $this->state = 'Sabah';
                    break;

                case '13':
                case '50':
                case '51':
                case '52':
                case '53':
                    $this->state = 'Sarawak';
                    break;

                case '14':
                case '54':
                case '55':
                case '56':
                case '57':
                    $this->state = 'Wilayah Persekutuan Kuala Lumpur';
                    break;

                case '15':
                case '58':
                    $this->state = 'Wilayah Persekutuan Labuan';
                    break;

                case '16':
                    $this->state = 'Wilayah Persekutuan Putrajaya';
                    break;

                case '82':
                default:
                    $this->state = 'Others';
                    break;
            }

            $tmp_negeri = $this->state;

            $tmp_jantina = intval($mykad);

            if($tmp_jantina % 2 == 0) {
                $this->gender = 'Perempuan';
            }
            else {
                $this->gender = 'Lelaki';
            }

            $detail = array(
                'mykad_no'  => $mykad,
                'dob'       => $this->dob,
                'state'     => $this->state,
                'gender'    => $this->gender,
                'years_old' =>$this->age
            );
            return $detail; // as array
        }
        return false;
    }

}
