<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request) {
        
        //salvare il nuovo lead
        $data = $request->all();

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        // return response()->json([
        //     'success' => true,
        //     'response' => $data,
        // ]);

        Mail::to($data['email'])->send(new NewLead($lead));

        //inviare un email all' amministratore
    }
}
