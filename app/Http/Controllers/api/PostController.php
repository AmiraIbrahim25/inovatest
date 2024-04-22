<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

public function AddPost(Request $request)
    {
        $rule = [
            'title' => 'required',
            'body' => 'required',
        ];
        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

             return response()->json(['Validation Error' => $validator->errors()], 400);
        } else {
       
            $input = $request->all();
            $input['user_id'] = Auth::id();
            $input['title'] =$request->title;
            $input['body'] =$request->body;

            $success = Post::create($input);

            return response()->json(['code' => 200,'message' => 'Create new post.', 'status' => true]);


        }

    }


    public function listUserPosts()
    {

            $posts = Post::with(['comment','rate','review'])->where('user_id', Auth::id())->paginate('10');
            return response()->json(['code' => 200,
            'status' => true,
            'message' => 'data retrieve ',
            'data' => $posts]);

    }

    public function listTopPosts()
    {

            $posts = Post::query()
            ->selectRaw('*, avg(rate.rate) as average_rating')
            ->join('rate', 'rate.post_id', 'posts.id')
            ->orderBy('ratings.post_id')
            ->orderByDesc('average_rating')
            ->paginate('10');
            return response()->json(['code' => 200,
            'status' => true,
            'message' => 'data retrieve ',
            'data' => $posts]);

    }


    public function AddReview(Request $request)
    {
        $rule = [

            'review' => 'required',

            'post_id' => 'required|exists:posts',


        ];
        $customMessages = [
            'required' => __('validation.attributes.required'),
        ];

        $validator = validator()->make($request->all(), $rule, $customMessages);

        if ($validator->fails()) {

            return response()->json(['Validation Error' => $validator->errors()], 400);

        } else {

            $data=Review::create([

                'review' => $request->review,

                'post_id' => $request->post_id,

            ]);

            return response()->json(['code' => 200,
            'status' => true,
            'message' => 'data added',
            'data' =>$data ]);


        }

    }




}
