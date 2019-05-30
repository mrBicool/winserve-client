<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as TransRequest;

class DavidController extends Controller
{
    //
    public function transaction(Request $request){
        $tr = TransRequest::first();
        dd('test',$tr,$tr->details);
    }
}
