<?php

namespace App\Controllers;

class Katalog extends BaseController
{
    public function index(): string
    {
        return view('katalog');
    }
}