<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
   
  public function index()
    {
        return view('API.home');
    }

    public function _index()
    {
        return view('API._home');
    }

  public function dayQuest()
  {
      return view('API.dayQuest');
  }
} 



  

