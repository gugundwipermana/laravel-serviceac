<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use App\Product;

class ProductsController extends Controller
{
    //
    private $product;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->middleware('auth');
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    public function store(ProductRequest $request, Product $product)
    {

        $title                  = \Input::get('title');
        $description     = \Input::get('description');
        $image              = \Input::get('image');

        if($image != '') {
            $imagename    = 'product-'.rand(11111,99999).'-gudperna.png';

            $image = str_replace(' ', '+', $image);
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);

            file_put_contents('upload/img/'.$imagename, $image);
        } else {
            $imagename = '';
        }

        $insert =  \DB::table('products')->insert([
            'title'                    => $title,
            'description'       => $description,
            'image'                => $imagename
        ]);

        //$insert = $product->create($request->all());

        if($insert) {
            return 0;
        } else {
            return 1;  
        }
    }

    public function daftar()
    {
        $token = csrf_token(); 
       
        $base_url = \URL::to('/');

        $product = $this->product->orderBy('id', 'desc')->get();
       
        $display = '';
        $no = 1;
        foreach ($product as $key) {
            $display .= "
                <tr>
                    <td>$no</td>
                    <td>$key->title</td>
                    <td>$key->description</td>
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

    public function edit(Product $product)
    {
        header("Content-type: text/x-json");
        return json_encode($product);
    }

    public function update(Request $request, Product $product)
    {
        $insert = $product->fill($request->input())->save();

        $image              = \Input::get('image');

        if($image != '') {
            $imagename    = 'product-'.rand(11111,99999).'-gudperna.png';

            $image = str_replace(' ', '+', $image);
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $image = base64_decode($image);

            file_put_contents('upload/img/'.$imagename, $image);

            $product->image = $imagename;
            $product->save();
        }         

        if($insert) {
            return 0;
        } else {
            return 1;  
        }

    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $delete = $product->delete();

        if($delete) {
            return 0;
        } else {
            return 1;  
        }
    }
}
