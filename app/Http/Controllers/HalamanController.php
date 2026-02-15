<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function tentangKami()
    {
        return view('pages.tentang-kami');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function bantuan()
    {
        return view('pages.bantuan');
    }

    public function kebijakanPrivasi()
    {
        return view('pages.kebijakan-privasi');
    }

    public function syaratKetentuan()
    {
        return view('pages.syarat-ketentuan');
    }
}
