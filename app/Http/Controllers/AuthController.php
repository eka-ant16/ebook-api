<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return 
        [
            "NIS" => 3103119055,
            "Nama" => "Eka Mukti Agung",
            "Gender" => "Laki-laki",
            "Phone" => 6281225877846,
            "Class" => "XII RPL 2"
        ];
    }
}
