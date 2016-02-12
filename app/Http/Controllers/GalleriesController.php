<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gallery;

class GalleriesController extends Controller
{
    //
    private $gallery;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Gallery $gallery)
    {
        $this->middleware('auth');
        $this->gallery = $gallery;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('galleries.index');
    }

    public function daftar()
    {
        $token = csrf_token(); 
       
        $base_url = \URL::to('/');

        $gallery = $this->gallery->orderBy('id', 'desc')->get();
       
        $display = '';
        $no = 1;
        foreach ($gallery as $key) {
            $display .= "
                <tr>
                    <td>$no</td>
                    <td><img src='$base_url/upload/img/$key->image' height='50' ></td>
                    <td>
                        <button data-id='$key->id' class='btn btn-primary btn-edit'><i class='fa fa-edit'></i></button>
                        <button data-id='$key->id' class='btn btn-danger btn-delete' data-token='$token'><i class='fa fa-trash'></i></button>
                    </td>
                </tr>
            ";
            $no++;
        }
        return $display;
        exit();
    }
}
