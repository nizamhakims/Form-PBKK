<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class FormController extends Controller{
    public function goToForm(){
        return view('form');
    }

    public function submit(Request $request){

        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
            'Email' => 'required|email:rfc',
            'pickFloat' => 'required|numeric|between:2.50,99.99',
            'Image' => 'required|image|max:2048'
        ]);

        $request->Image->storeAs('public/images', $request->Image->getClientOriginalName());
        
        $results = [
            'Username' => $request->Username,
            'Password' => $request->Password,
            'Email' => $request->Email,
            'pickFloat' => $request->pickFloat,
            'Image' => $request->Image->getClientOriginalName()
        ];

        return redirect('/submission')->with(['results' => $results, 'status' => 'Form Submitted']);
    }

    public function showSubmission(){
        $results = session()->get('results');

        return view('submission', ['results' => $results]);
    }
}