<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Imports\CoursesImport;
use App\Models\Course;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    private $course;

    public function __construct(Course $course)
    {
        $this->middleware(['permission:read-courses'])->only('index', 'show');
        $this->middleware(['permission:create-courses'])->only('create', 'store');
        $this->middleware(['permission:update-courses'])->only('edit', 'update');
        $this->middleware(['permission:delete-courses'])->only('destroy');
        $this->course = $course;
    }

    public function index()
    {
        try {
            $courses = $this->course->latest('id')->get();
            return view('admin.courses.index', compact('courses'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        try {
            Excel::import(new CoursesImport(), $request->courses);

            return redirect()->route('courses.index')->with('success', __('message.created_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        //
    }

    public function update(Request $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        //
    }
}
