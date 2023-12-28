<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;


class GetAQuoteController extends Controller
{
    


    public function store(Request $request)
    {

        $quote = new Quote();
        $quote->user_id = $request->user_id;
        $quote->company_id = $request->company_id;
        $quote->company_name = $request->company_name;
        $quote->sum_insured = $request->sum_insured;
        $quote->model_year = $request->model_year;
        $quote->make = $request->make;
        $quote->model = $request->model;
        $quote->first_registration_date = $request->first_registration_date;
        $quote->premium_price = $request->premium_price;
        $quote->motor_name = $request->motor_name;
        $quote->plate_number = $request->plate_number;
        $quote->expiry_date = $request->expiry_date;
        $quote->total_premium_price = $request->total_premium_price;
        $quote->save();

        return response()->json(['message' => 'Quote saved successfully!'], 200);
    }

   

    public function getQuotes($userid)

    {


        $quotes = Quote::where('user_id', $userid)->get();


        return response()->json(["quotes" => $quotes]);
    }
}
