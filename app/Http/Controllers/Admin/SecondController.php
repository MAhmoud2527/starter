<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use stdClass;

class SecondController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth')->except('ShowName2');
    }
    public function ShowName()
    {
        return "Static Value";
    }
    public function ShowName2()
    {
        $obj = new stdClass();
        
        $obj -> name = 'Mahmoud Ahmed';
        $obj -> age = 26;
        $obj -> gender = 'Male';
        $data = array("a" , "b" , "c" , 1 , 6);
        $data2 = array();
        return view('welcome' , compact('obj' , 'data' ,'data2'));
    }
}
