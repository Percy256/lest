<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Troy extends Controller
{
public function customer(){
        return view('customer');

}
public function admin(){
    return view('admin');
}
}
