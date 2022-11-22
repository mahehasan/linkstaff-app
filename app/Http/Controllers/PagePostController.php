<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\PagePost;

class PagePostController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$pageId)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'post_content' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $pagePost = new PagePost();
        $pagePost->post_content = $input['post_content'];
        $pagePost->page_id_fk = $pageId;
        $pagePost->user_id_fk = auth()->user()->id;
        $pagePost->save();
        return $this->sendResponse($pagePost->id, 'Page Post created.');
    }
}
