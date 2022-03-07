<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\Problem;
use Illuminate\Support\Facades\Validator;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($problem_id)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $problem_id)
    {
        if (auth('sanctum')->check()) {
            $validator = Validator::make($request->all(), [
                'solution_details' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'validation_errors' => $validator->errors(),
                ]);
            } else {
                $problem = Problem::where('id', $problem_id)->firstOrFail();
                if ($problem) {
                    $user_id = auth('sanctum')->user()->id;
                    $solution = new Solution;
                    $solution->solution_details = $request->input('solution_details');
                    $solution->problem_id = $problem->id;
                    $solution->user_id = $user_id;
                    $solution->save();

                    return response()->json([
                        'status' => 200,
                        'message' => 'Your solution has been posted successfully'
                    ]);

                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'No such problem is found'
                    ]);
                }
            }
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to post solve this problem'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
