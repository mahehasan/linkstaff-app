<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\BaseController as BaseController;

class PostController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'post_content' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $post = new Post();
        $post->post_content = $input['post_content'];
        $post->user_id_fk = auth()->user()->id;
        $post->save();
        return $this->sendResponse($post->id, 'Post created.');
    }


}
