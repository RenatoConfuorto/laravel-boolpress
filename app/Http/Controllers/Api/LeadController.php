<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request) {
        
        //salvare il nuovo lead
        $data = $request->all();

        $validator = Validator::make($data, $this->getValidationRules());

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        // return response()->json([
        //     'success' => true,
        //     'response' => $data,
        // ]);

        //inviare un email all' amministratore
        Mail::to('admin-boolpress@gmail.com')->send(new NewLead($lead));

        return response()->json([
            'success' => true,
        ]);
    }

    public function getValidationRules() {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ];
    }
}
