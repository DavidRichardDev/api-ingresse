<?php

namespace App\API;

class ApiError{
    /**
     * Define structure of messages API error
     *
     * @param  array  $data
     * @return array data message
     */
    public static function errorMessage($message, $code){
        return [

            'data' => [
                'message' => $message,
                'code'  => $code
            ]
        ];
    }
}