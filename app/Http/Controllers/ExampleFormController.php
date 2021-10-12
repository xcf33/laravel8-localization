<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleFormController extends Controller
{

    function view() {
        return view('form');
    }

    function store() {
        $validation_rules = [
            'int_number' => 'required|integer',
        ];

        request()->validate($validation_rules);

        return redirect()->route('example-form', ['locale' => app()->getLocale()]);
    }
}
