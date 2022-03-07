<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Exception;
use App\Mail\NotificationMail;

class ProblemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems = Problem::orderBy('created_at', 'DESC')->with('user')->get();
        return response()->json([
            'status' => 200,
            'problems' => $problems
        ]);
    }

    public function myProblems()
    {
        if (auth('sanctum')->check()) {

            $user_id = auth('sanctum')->user()->id;
            $myProblems = Problem::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
            if ($myProblems) {
                return response()->json([
                    'status' => 200,
                    'myProblems' => $myProblems
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Currently have not posted problem'
                ]);
            }
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to post your problem'
            ]);
        }
    }

    public function taggedProblems()
    {
        if (auth('sanctum')->check()) {
            $user_id = auth('sanctum')->user()->id;
            $taggedProblems = Problem::where('tagged_id', $user_id)->orderBy('created_at', 'DESC')->get();
            if ($taggedProblems) {
                return response()->json([
                    'status' => 200,
                    'taggedProblems' => $taggedProblems
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'You have no problem that you have been tagged.'
                ]);
            }
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to post your problem'
            ]);
        }

    }

    public function solvedProblems()
    {
        if (auth('sanctum')->check()) {

            $user_id = auth('sanctum')->user()->id;
            $solvedProblems = Problem::where('status', 1)->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
            if ($solvedProblems) {
                return response()->json([
                    'status' => 200,
                    'solvedProblems' => $solvedProblems
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'This problem has not solved'
                ]);
            }
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to post your problem'
            ]);
        }
    }
    public function unSolvedProblems()
    {
        if (auth('sanctum')->check()) {
            $user_id = auth('sanctum')->user()->id;

            $unSolvedProblems = Problem::where('status', 0)->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
            if ($unSolvedProblems) {
                return response()->json([
                    'status' => 200,
                    'unSolvedProblems' => $unSolvedProblems
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'This problem has be solved'
                ]);
            }
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to post your problem'
            ]);
        }
    }

    public function allUsers()
    {
        if (auth('sanctum')->check()) {
            $users = User::all();
            return response()->json([
                'status' => 200,
                'users' => $users
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to post your problem'
            ]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth('sanctum')->check()) {
            $validator = Validator::make($request->all(), [
                'problem_details' => 'required',
                'targeted_person' => 'required',
                'service' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'validation_errors' => $validator->errors(),
                ]);
            } else {
                $user_id = auth('sanctum')->user()->id;
                $targeted_id = $request->input('targeted_person');
                $problem_details = $request->input('problem_details');
                $service_id = $request->input('service');
                $problem = new Problem;

                $problem->problem_details = $problem_details;
                $problem->targeted_id = $targeted_id;
                $problem->user_id = $user_id;
                $problem->service_id = $service_id;


                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    $file->move('uploads/product', $filename);

                    $problem->image = 'uploads/problemsImages/' . $filename;
                }

                $problem->save();

                // $sender = User::where('id', $user_id)->firstOrFail();
                // $sender_firstname = $sender->first_name;
                // $sender_lastname = $sender->last_name;

                // $recipient = User::where('id', $targeted_id)->firstOrFail();
                // $recipient_mail = $recipient->email;

                // $service = Service::where('id', $service_id)->firstOrFail();
                // $service_name = $service->name;

                // $mailData = [
                //     'firstname' => $sender_firstname,
                //     'lastname' => $sender_lastname,
                //     'service' => $service_name,
                //     'problem' => $problem_details
                // ];

                // try {
                    
                //     Mail::to($recipient_mail)->send(new NotificationMail($mailData));
                //     return response()->json([
                //         'status' => 200,
                //         'message' => 'Your problem has been shared successfully'
                //     ]);
                // } catch (Exception $e) {
                //     return response()->json([
                //         'status' => 500,
                //         'message' => 'Check network your network connectivity'
                //     ]);
                // }
            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to post your problem'
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
        if (auth('sanctum')->check()) {
            $problem = Problem::where('id', $id)->with('solution')->firstOrFail();
            return response()->json([
                'status' => 200,
                'problem' => $problem
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to post your problem'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth('sanctum')->check()) {
        }
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
        if (auth('sanctum')->check()) {
            $user_id = auth('sanctum')->user()->id;
            $problem = Problem::find($id)->where('user_id', $user_id);
            if ($problem) {
                $problem->status = $request->input('status');
                $problem->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Your have sucessfully tagged as solved'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Sorry, this problem cannot be tagged as solve by you'
                ]);
            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Please login to update problem status'
            ]);
        }
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
