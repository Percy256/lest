<?php

namespace App\Http\Controllers;
use DB;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if($page == "maps"){
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

        if($page == "table"){
             $data = DB::select("select * from participants");
             $prticipant_data = array();
 
             foreach($data as $pdt){
                 if(!in_array($pdt->id, $prticipant_data)){
                     array_push($prticipant_data, $pdt->id);
                     array_push($prticipant_data, $pdt->name);
                     array_push($prticipant_data, $pdt->DOB);
                     array_push($prticipant_data, $pdt->product);
                 }
             }
 

            return view('pages.table', ['participants' => $prticipant_data]);
        }
        
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }
        return abort(404);
    }
}
