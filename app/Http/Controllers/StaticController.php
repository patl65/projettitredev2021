<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function welcome()
    {
        return view('pages.welcome');
    }

    public function latuEntreprise()
    {
        return view('pages.latuEntreprise');
    }

    public function peinture()
    {
        return view('pages.peinture');
    }

    public function sols()
    {
        return view('pages.sols');
    }

    public function ite()
    {
        return view('pages.ite');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function mentionsLegales()
    {
        return view('pages.mentionsLegales');
    }

}
