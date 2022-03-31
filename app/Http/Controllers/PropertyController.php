<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\OwnersProperty;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'rent_value' => 'required|numeric',
            'sale_value' => 'required|numeric',
            'cep' => 'required|formato_cep',
            'state' => 'required|uf',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:10',
            'district' => 'required|string|max:255',
            'complement' => 'string|max:255',
            'country' => 'required|string|max:255',
            'company_id' => 'required|exists:company,id',
            'property_owners_id' => 'required|array|exists:property_owner,id'
        ]);

        $property = Property::create($request->all());
        $property->fresh();

        foreach ($request->property_owners_id as $propery_owner) {
            OwnersProperty::create(
                [
                'property_id' => $property->id,
                'property_owner_id' => $propery_owner
                ]
            );
        }

        return response()->json(
            [
              'message' => 'Imóvel cadastrado com sucesso', 
              'property' => $property
            ]
        , 200);

    }

    public function update(Request $request){

    }

    public function delete(Request $request){

    }
}
