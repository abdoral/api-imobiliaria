<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyOwnerController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:property_owner,email',
            'phone' => 'required|celular_com_ddd',
            'cpf' => 'required|formato_cpf',
            'birthdate' => 'required|date',
            'marital_status' => 'required',
            'complement' => 'string',
            'country' => 'required|string',
            
        ]);
    }
}
