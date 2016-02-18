<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;

class QuestionsController extends Controller
{
    //
    private $question;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Question $question)
    {
        //$this->middleware('auth');
        $this->question = $question;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions.index');
    }

    public function daftar()
    {
        $token = csrf_token(); 
       
        $base_url = \URL::to('/');

        $question = $this->question->orderBy('id', 'desc')->get();
       
        $display = '';
        $no = 1;
        foreach ($question as $key) {
            $display .= "
                <tr>
                    <td>$no</td>
                    <td>$key->name</td>
                    <td>$key->email</td>
                    <td>$key->description</td>
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

    public function store(Request $request, Question $question)
    {

        $insert = $question->create($request->all());

        if($insert) {
            return 0;
        } else {
            return 1;  
        }
    }

    public function edit(Question $question)
    {
        header("Content-type: text/x-json");
        return json_encode($question);
    }

    public function storeGuest(Request $request, Question $question)
    {
        $insert = $question->create($request->all());

        return redirect('contact');
    }

    public function update(Request $request, Question $question)
    {
        $insert = $question->fill($request->input())->save();    

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
    public function destroy(Question $question)
    {
        $delete = $question->delete();

        if($delete) {
            return 0;
        } else {
            return 1;  
        }
    }
}
