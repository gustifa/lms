<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Course_goal;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class CourseController extends Controller
{
    public function AllCourse(){
        $id = Auth::user()->id;
        $course = Course::where('guru_id', $id)->orderBy('id', 'desc')->get();
        return view('guru.courses.courses_all', compact('course'));
    }
}
