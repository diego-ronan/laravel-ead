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

    public function index($lessonId)
    {
        $lessons = $this->repository->getLessonsByModuleId($lessonId);
        return LessonResource::collection($lessons);
    }

    public function show($id)
    {
        $this->repository->getLesson($id);
        return new LessonResource($this->repository->getLesson($id));
    }
}
