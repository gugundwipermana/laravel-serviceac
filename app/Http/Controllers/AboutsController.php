<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\About;

class AboutsController extends Controller
{
    //
    private $about;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(About $about)
    {
        $this->middleware('auth');
        $this->about = $about;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('abouts.index');
    }

    public function daftar()
    {
        //$token = csrf_token(); 
       
        $base_url = \URL::to('/');

        $about = $this->about->orderBy('id', 'desc')->get();
       
        $display = '';
        $no = 1;
        foreach ($about as $key) {
            $display .= "
                <div class='panel panel-default'>
                  <div class='panel-body'>
                    <img src='$base_url/upload/img/$key->image' height='100' >
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

    public function edit(About $about)
    {
        header("Content-type: text/x-json");
        return json_encode($about);
    }

    public function update(Request $request, About $about)
    {
        $insert = $about->fill($request->input())->save();

        $image              = \Input::get('image');

        if($image != '') {
            $imagename    = 'about-'.rand(11111,99999).'-gudperna.png';

            $image = str_replace(' ', '+', $image);
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);

            file_put_contents('upload/img/'.$imagename, $image);

            $about->image = $imagename;
            $about->save();
        }         

        if($insert) {
            return 0;
        } else {
            return 1;  
        }

    }
}
