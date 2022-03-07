<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Service;

class FilterController extends Controller
{
    public function filterProblems($date,$service_name)
    {
        $service = Service::where('name', $service_name)->firstOrFail();
        if ($service){
            //$problems = Problem::where('created_at',$date)->where('service_id',$service->id)->get();
            $problems = Problem::search($date)->where('service_id',$service->id)->get();
            
            return response()->json([
                'status' => 200,
                'problems' => $problems
            ]);
        }
        else{
            return response()->json([
                'status' => 400,
                'message' => 'Such has a service does not exist.'
            ]); 
        }
        
    }
}
