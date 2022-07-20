<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;
use App\Repositories\ReplySupportRepository;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    protected $repository;

    public function __construct(ReplySupportRepository $replySupportRepository)
    {
        $this->repository = $replySupportRepository;

    }

    public function createReply($supportId, StoreReplySupport $request){
        $reply = $this->repository->createReplyToSupport($supportId, $request->validated());

        return new ReplySupportResource($reply);
    }
}
