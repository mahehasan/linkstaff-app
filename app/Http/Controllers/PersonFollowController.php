<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\PersonFollow;

class PersonFollowController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($personId)
    {
        if (PersonFollow::where('user_id_fk', auth()->user()->id)->where('follow_id_fk', $personId)->exists()) {
            return $this->sendError('Already followed.', ['error'=>'Unauthorised']);
        }
        $personFollow = new PersonFollow();
        $personFollow->user_id_fk = auth()->user()->id;
        $personFollow->follow_id_fk = $personId;
        $personFollow->follow_at = now();
        $personFollow->save();
        return $this->sendResponse($personFollow->id, 'Following now.');
    }
}
