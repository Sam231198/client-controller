<?php
namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Filters\V1\CourseFilter;
use App\Http\Resources\V1\CourseCollectionResource;

class CourseController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"course"},
     *     summary="Returns a list of courses",
     *     description="Returns a object of courses",
     *     path="/V1/course",
     *     @OA\Response(response="200", description="A list with courses"),
     * ),
     * 
    */
    public function index() {
        $course = (new CourseFilter(Course::class))->apply();
        return new CourseCollectionResource($course);
    }
   
}