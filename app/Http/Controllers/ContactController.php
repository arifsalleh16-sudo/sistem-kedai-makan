<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact', [
            'nama' => 'Arif',
            'tel' => '0105680048'
        ]);
    }
}
