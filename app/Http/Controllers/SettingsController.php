<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting;

class SettingsController extends Controller
{
    //
    private $setting;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Setting $setting)
    {
        $this->middleware('auth');
        $this->setting = $setting;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.index');
    }

    public function daftar()
    {
        $token = csrf_token(); 
       
        $base_url = \URL::to('/');

        $setting = $this->setting->orderBy('id', 'desc')->get();
       
        $display = '';
        $no = 1;
        foreach ($setting as $key) {
            $display .= "

                <div class='panel panel-default'>
                  <div class='panel-body'>
                    <table class='table table-striped' cellspacing='0' width='100%'>
                            <tr><td>Contact</td><td>$key->contact</td></tr>
                            <tr><td>Quote</td><td>$key->quote</td></tr>
                            <tr><td>Image</td><td><img src='$base_url/upload/img/$key->image' height='50' ></td></tr>
                            <tr><td>Latitude</td><td>$key->lat</td></tr>
                            <tr><td>Longitude</td><td>$key->long</td></tr>
                    </table>

                    <button data-id='$key->id' class='btn btn-primary btn-edit'><i class='fa fa-edit'></i></button>

                  </div>
                </div>
                
            ";
            $no++;
        }
        return $display;
        exit();
    }

    public function edit(Setting $setting)
    {
        header("Content-type: text/x-json");
        return json_encode($setting);
    }

    public function update(Request $request, Setting $setting)
    {
        $insert = $setting->fill($request->input())->save();     

         $image              = \Input::get('image');

        if($image != '') {
            $imagename    = 'setting-'.rand(11111,99999).'-gudperna.png';

            $image = str_replace(' ', '+', $image);
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);

            file_put_contents('upload/img/'.$imagename, $image);

            $setting->image = $imagename;
            $setting->save();
        }         

        if($insert) {
            return 0;
        } else {
            return 1;  
        }

    }
}
