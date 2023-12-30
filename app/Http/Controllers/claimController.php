<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class claimController extends Controller
{
    public function storeClaims(Request $request)
    {
        $claim = new Claim();
        $claim->user_id = $request->user_id;
        $claim->driver_cpr = $request->driver_cpr;
        $claim->insurance_company = $request->insurance_company;
        $claim->owner_cpr = $request->owner_cpr;
        $claim->phone_number = $request->phone_number;
        $claim->email = $request->email;
        $claim->vehcileno = $request->vehcileno;
        $claim->surveydate = $request->surveydate;
        $claim->remarks = $request->remarks;
        $claim->garage_name = $request->garage_name;

        $claim->save();

        return response()->json(['message' => 'Claim saved successfully!'], 200);
    }



    public function getClaims($userid)

    {


        $claims = Claim::where('user_id', $userid)->get();


        return response()->json(["claims" => $claims]);
    }
}
