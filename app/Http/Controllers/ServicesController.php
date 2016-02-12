<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service;

class ServicesController extends Controller
{
    //
    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Service $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index');
    }

    public function daftar()
    {
        $token = csrf_token(); 
       
        $base_url = \URL::to('/');

        $service = $this->service->orderBy('id', 'desc')->get();
       
        $display = '';
        $no = 1;
        foreach ($service as $key) {
            $display .= "

                <div class='panel panel-default'>
                  <div class='panel-body'>
                    <p>$key->description</p>
                    <button data-id='$key->id' class='btn btn-primary btn-edit'><i class='fa fa-edit'></i></button>
                  </div>
                </div>
                
            ";
            $no++;
        }
        return $display;
        exit();
    }

    public function edit(Service $service)
    {
        header("Content-type: text/x-json");
        return json_encode($service);
    }

    public function update(Request $request, Service $service)
    {
        $insert = $service->fill($request->input())->save();     

        if($insert) {
            return 0;
        } else {
            return 1;  
        }

    }
}
