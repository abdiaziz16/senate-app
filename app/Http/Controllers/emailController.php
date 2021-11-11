<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Senators;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Log;
class emailController extends Controller
{
    /**
     * Use This function to send an email to a specific senator
     * This function calls the sendEmail Request class which validates our request input.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function emailSenator(SendEmailRequest $request)
    {
        #Note: request information is already validated with SendEmailRequest class

        #Get senator information
        $senator = DB::table('senators')->where('id','=',$request['senator_id'])->first();

        #validate that senator exists and has an email address setup
        if(isset($senator) && !empty($senator->email)) {
            # Create email params for our mail class
            $emailParams = [
                'sender_email' => $request['sender_email'],
                'sender_last_name' => $request['sender_last_name'],
                'body' => $request['message']
            ];

            #Call mail with the email params
            try{
                Mail::to($senator->email)->send(new \App\Mail\Mail($emailParams));
                #Send success response
                $response = response()->json([
                    'success' => true,
                    'errors' => "Email Sent"
                ]);
            }catch (\Exception $e){
                $response = response()->json([
                    'success' => false,
                    'errors' => "Email Could not be sent. Please try again"
                ]);

                Log::error('Error (xe3232xds): Email could not be sent to: '.$senator->email);
            }

        }else{
            $response =  response()->json([
                'success' => false,
                'errors' => "Senator ID does not exist"
            ]);
            Log::error('Error (f320kcxe232): Senator ID could not be found: '.$request['senator_id']);
        }

        return $response;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
