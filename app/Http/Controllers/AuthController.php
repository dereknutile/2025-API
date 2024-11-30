<?php

namespace App\Http\Controllers;

use Api\Traits\ApiResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponses;

    public function login() {
        return $this->ok('Hello, login route!');
    }
}
