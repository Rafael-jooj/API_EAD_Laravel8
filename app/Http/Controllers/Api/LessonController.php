<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Repositories\LessonRepository;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $repository;

    public function __construct(LessonRepository $lessonRepository)
    {
        $this->repository = $lessonRepository;
    }

    public function index($moduleId){
        $module = $this->repository->getLessonsByModuleId($moduleId);

        return LessonResource::collection($module);
    }

    public function show($id){
        return new LessonResource($this->repository->getLesson($id));
    }
}
