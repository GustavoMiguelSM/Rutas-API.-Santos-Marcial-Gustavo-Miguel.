<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DisasterStoreRequest;
use App\Models\Disaster;
use Illuminate\Support\Facades\DB;
use Exception;

class DisasterController extends Controller
{
    public function show($id){
        try{
            $disaster = Disaster::find($id);
            
        } catch (Exception $e) {
            return response()->json(('message' -> $e -> getMessage()),500);
        }
    }



    public function update(DisasterUpdateRequest $request) {
        try{
            $disaster = Disaster::find($id);
            $disaster->$request -> description = Input::get('description');
            $disaster->$request-> casualties = Input::get('casualties');
            $disaster->$request-> level = Input::get('level');
            $disaster->save();
        } catch (Exception $e) {
            return response()->json(('message' -> $e -> getMessage()),500);
        }
    }
    public function store(DisasterStoreRequest $request) {
        try {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $request->merge(['location' => DB::raw("St_GeomFromText('Point($longitude $latitude)')")]);
           
            $disaster = Disaster::all()->paginate(15);
            return view('disaster.index', ['disaster' => $disaster]);

            $disaster = Disaster::create($request->all());
 

             $DisasterPublicService = $request->only(['name']);
             $DisasterPublicService['PublicService_id'] = $PublicService->id;
            
             $disaster -> $DisasterPublicService -> name;

             $Disasterlevel = $request->only(['name','level']);
             $Disasterlevel['damage_level_id'] = $DamageLevel->id;
             
             $disaster -> $Disasterlevel -> name;
             $disaster -> $Disasterlevel -> level;

             $disaster->save();

            return response()->json($disaster);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
