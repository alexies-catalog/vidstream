<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contactusform;

class DashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard.index');
    }
    public function getMessages(){
        $messages = Contactusform::all();

        return view('admin.dashboard.contactus' , compact('messages'));
    }
}
