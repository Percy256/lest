<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->email == "admin@work.com"){
            $data = DB::select("select * from participants order by points desc");
            $prticipant_data = array();

            foreach($data as $pdt){
                if(!in_array($pdt->id, $prticipant_data)){
                    array_push($prticipant_data, $pdt->id);
                    array_push($prticipant_data, $pdt->name);
                    array_push($prticipant_data, $pdt->DOB);
                    array_push($prticipant_data, $pdt->product);
                    array_push($prticipant_data, $pdt->points);
                }
            }

            return view('home', ['participants' => $prticipant_data]);
        }


        $data = DB::select("select * from products");
        $products = array();

        foreach($data as $pdt){
            if(!in_array($pdt->ParticipantID, $products)){
                array_push($products, $pdt->ParticipantID);
                array_push($products, $pdt->ProductName);
                array_push($products, $pdt->description);
                array_push($products, $pdt->Quantity);
            }
        }
        return view("pages.maps", ['product' => $products]);
    }
}
