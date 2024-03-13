<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeController extends Controller
{
    public function index()
    {
        return view('primo');
    }

    public function checkPrime(Request $request)
    {
        $number = $request->get('number');
        $isPrime = $this->isPrime($number);
        return view('primo', ['number' => $number, 'isPrime' => $isPrime]);
    }

    private function isPrime($number)
    {
        if ($number <= 1) return false;
        if ($number <= 3) return true;
        if ($number % 2 == 0 || $number % 3 == 0) return false;
        for ($i = 5; $i * $i <= $number; $i += 6) {
            if ($number % $i == 0 || $number % ($i + 2) == 0) return false;
        }
        return true;
    }
}
