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
         $galleries = $this->gallery->orderBy('id', 'desc')->get();
        return view('galleries.index', compact('galleries'));
    }

    public function store(Request $request, Gallery $gallery)
    {

        $image = '';

       if(\Input::hasFile('image'))
        {

            $destinationPath = 'upload/img'; // upload path
            $nameimage = \Input::file('image')->getClientOriginalName();
            $fileName = rand(11111,99999).'-'.$nameimage; // renameing image
            \Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

            $image = $fileName;
        }

        $insert =  \DB::table('galleries')->insert([
            'image'                => $image
        ]);

        //$insert = $product->create($request->all());

         return redirect('galleries');
    }

    public function destroy(Gallery $gallery)
    {
        //
        $gallery->delete();
        
        return redirect('galleries');
    }
}
