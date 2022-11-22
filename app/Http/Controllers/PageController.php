<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\BaseController as BaseController;

class PageController extends BaseController
{
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'page_name' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $page = new Page();
        $page->page_name = $input['page_name'];
        $page->user_id_fk = auth()->user()->id;
        $page->save();
        return $this->sendResponse($page->id, 'Page created.');
    }
}
