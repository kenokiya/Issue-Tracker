<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\Problem;
use App\Models\Service;

class AllProblemsSolutionsController extends Controller
{
    public function problems()
    {
        $problems = Problem::orderBy('created_at', 'DESC')->get();
        if($problems){
            return response()->json([
                'status' => 200,
                'problems' => $problems
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Currently there are problems that have posted'
            ]);
        }
       
    }

    public function Solutions($problem_id)
    {
        $problem = Problem::where('id', $problem_id)->firstOrFail();

        if ($problem) {
            $solution = Solution::where('problem_id', $problem->id)->orderBy('created_at', 'DESC')->get();

            if ($solution) {
                return response()->json([
                    'status' => 200,
                    'solution' => $solution
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'This problem has not solution'
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such problem found'
            ]);
        }
    }
    public function solvedProblems()
    {
        $solvedProblems = Problem::where('status', 1)->orderBy('created_at', 'DESC')->get();
        if($solvedProblems)
        {
            return response()->json([
                'status' => 200,
                'solvedProblems' => $solvedProblems
            ]);
        }
        else{
            return response()->json([
                'status' => 400,
                'message' => 'This problem has not solved'
            ]); 
        }
        
    }
    public function unSolvedProblems()
    {
        $unSolvedProblems = Problem::where('status', 0)->orderBy('created_at', 'DESC')->get();
        if($unSolvedProblems)
        {
            return response()->json([
                'status' => 200,
                'unSolvedProblems' => $unSolvedProblems
            ]);
        }
        else{
            return response()->json([
                'status' => 400,
                'message' => 'This problem has be solved'
            ]); 
        }
    }

    //Get analysis of problems according to service
    public function serviceAnalysis()
    {
        $serviceAnalysis = Service::with('problem')->get();

        return response()->json([
            'status' => 200,
            'service' => $serviceAnalysis
        ]);
    }
}
