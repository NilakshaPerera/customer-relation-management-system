<?php

namespace Libraries;

use Auth;
use App\Eventlog;

class LogData {

    static function addDelete() {
        
    }

    static function log($event, $function, $content) {

        $userId = 0;
        if (Auth::user()) {
            $userId = Auth::user()->id;
        }

        $logData = array(
            'user_id' => $userId,
            'event' => $event,
            'functionname' => $function,
            'content' => $content,
            'iserror' => 0,
        );
        Eventlog::create($logData);
    }

    static function logError($event, $function, $error) {
        $userData = array(
            'user_id' =>  (Auth::user())? Auth::user()->id : 0,
            'event' => $event,
            'functionname' => $function,
            'content' => $error,
            'iserror' => 1,
        );
        Eventlog::create($userData);
    }

    static function numberShorten($number, $precision = 1, $divisors = null) {

        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => 'M', // Million
                pow(1000, 3) => 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
                pow(1000, 7) => 'Si', // Sextillion
            );
        }

        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                break;
            }
        }

        return number_format($number / $divisor, $precision) . $shorthand;
    }

    /**
     * Created By : Nilaksha 
     * Created AT : 9/1/2019
     * Summary : Checks if the logged in user is an admin or not
     * @return boolean
     */
    static function isAdmin() {
        if (Auth::user()->role_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Created By : Nilaksha 
     * Created At : 9/1/2019
     * Summary : Returns the user ID of the current logged in user. 
     *          zero is passed if the user is not logged in
     * @return type
     */
    static function currentId() {
        $userId = 0;
        if (Auth::user()) {
            $userId = Auth::user()->id;
        }
        return $userId;
    }

}
