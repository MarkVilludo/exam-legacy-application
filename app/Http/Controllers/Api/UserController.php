<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{   
    //
    public function __construct(User $user) {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $users = $this->user->get();

        if (count($users) > 0) {
            $data['data'] = UserResource::collection($users);
            $data['message'] = 'Shows user list.';
        } else  {
            $data['data'] = [];
            $data['message'] = 'No users found.';
        }

        //200 status code
        return response()->json($data, 200);
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
        // return $request->all();
        $rules =  [
            'id' => 'required|integer',
            'name' => 'required|string',
            'comments' => 'required',
            'password' => 'nullable',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $data['response'] = $validator->messages();
            $data['message'] = 'Validation Error.';

            //validation error
            $statusCode = 422;
        } else {

            //check if exist user and its comment 
            //assuming is test only
            //but the comments table must different in users table
            //for user can comment in any post if ever it has in the future.

            $checkExistData = $this->user->find($request->id);

            if ($checkExistData) {
                $checkExistData->name = $request->name;
                $checkExistData->comments = $request->comments;
                $checkExistData->password = bcrypt($request->password);
                $checkExistData->update();

                $msg = 'Successfully updated data.';

            } else {
                $newData = new $this->user;
                $newData->id = $request->id;
                $newData->name = $request->name;
                $newData->comments = $request->comments;
                $newData->password = bcrypt($request->password);
                $newData->save();

                $msg = 'Successfully saved data.';
            }

            $data['message'] = $msg;
            $statusCode = 200;

        }

        return response()->json($data, $statusCode);
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
        $userData = $this->user->find($id);

        if ($userData) {
            $data['data'] = new UserResource($userData);
            $data['message'] = 'Show user data.';
            $statusCode = 200;
        } else {
            $data['data'] = NULL;
            $data['message'] = 'User not found.';

            //not found status code
            $statusCode = 404;
        }

        return response()->json($data, $statusCode);
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
        $rules =  [
            'comments' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $data['response'] = $validator->messages();
            $data['message'] = 'Validation Error.';

            //validation error
            $statusCode = 422;
        } else {

            $userData = $this->user->find($id);

            if ($userData) {
                $userData->comments = $request->comments;
                $userData->update();

                $data['message'] = 'Successfully updated user comments.';
                $statusCode = 200;
            }  else {
                $data['data'] = NULL;
                $data['message'] = 'User not found.';

                //not found status code
                $statusCode = 404;
            }
        }

        return response()->json($data, $statusCode);
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
