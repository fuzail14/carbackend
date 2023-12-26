<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;


class CarController extends Controller
{
    // app/Http/Controllers/CarController.php

 public function addNewCar(Request $request)
    {
        
        // Validate the request data
        $data = $request->validate([
            'car_name' => 'required|string|max:255',
            'car_model' => 'required|string|max:255',
            'car_number' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id'
        ]);

        // Create the car
        $car = Car::create($data);

        return response()->json($car, 200);
    }

    public function viewCars($userId)
    {
        
        
        $cars = Car::where('user_id', $userId)->get();

        return response()->json(["data" => $cars]);
    }



    public function getCars($userid)

    {


        $car = Car::where('user_id', $userid)->get();


        return response()->json(["data" => $car]);
    }

}
