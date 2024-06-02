<?php

namespace App\Controllers;

class DisplayController {
    const ROUGE = 'danger';
    const ORANGE = 'warning';
    const VERTE = 'success';
    public static function messageAlert(string $message, string $type):void {
        $_SESSION['alert']=[
            'type'=> $type,
            'message'=> $message,
        ];
    }

}