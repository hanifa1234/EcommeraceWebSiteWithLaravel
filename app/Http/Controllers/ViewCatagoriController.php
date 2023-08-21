<?php

namespace App\Http\Controllers;

use App\Models\Catagori;
use Illuminate\Http\Request;

class ViewCatagoriController extends Controller
{
    //

    public function view_catagori(){
        $data = Catagori::all();
            return view('admin.catagori',compact('data'));
    }
}
