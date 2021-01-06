<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Hash; 
use App\Visitor;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Create Visitor 
Route::Post('visitors/create', function(Request $req) {
    //Validate input
    $validator = Validator::make($req->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8' /*, 'confirmed'*/ ],
        'gender' => ['required', 'string', 'max:1']
    ]);

    if ($validator->fails()) {
        return response() -> json([
            'error'=> [
                'messages' => $validator->messages(),
                "requestid" => $req->id
            ]
        ], 400);
    }
    
    $visitor = new Visitor;
    $visitor->name = $req->name;
    $visitor->email = $req->email;
    $visitor->password = Hash::make($req->password); 
    $visitor->gender =  $req->gender;
    $visitor->save(); 

    return response() -> json([
        'message' => 'Visitor Registered Successfully',
    ], 201);
});

//Retrieve All Visitors
Route::get('/visitors', function() { 
    $visitors = Visitor::all(); 
    return response()->json($visitors); 
}); 

//Retrieve a Visitor by ID
Route::get('/visitors/{visitor_id}', function ($visitorID) {
    $visitor = Visitor::find($visitorID);

    if($visitor==null) 
        return response()->json([
            'error' => [
                'message' => 'Visitor is not found'
            ]
        ], 404 );
    
    return response()->json($visitor, 200);
});
