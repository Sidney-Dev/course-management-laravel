<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseCreateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Gate::inspect('viewAny', Course::class);

        if(empty($response->allowed())) {
            return redirect()->back()->withError($response->message());
        }

        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create the course
        $createdCourse = Course::create([
            'name' => $request->name,
            'image' => ''
        ]);

        $file = $request->file('image');

        if ($file) {
            $imageName = time() . $file->getClientOriginalName();
            $imagePath = "images/course/$createdCourse->id/$imageName";
            Storage::disk('public')->put($imagePath, file_get_contents($file));
            $createdCourse->fill(['image' => $imageName])->save();
        }

        return redirect()->back()->withSuccess("New course successfully created");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $response = Gate::inspect('update', $course);

        if(empty($response->allowed())) {
            return redirect()->back()->withError($response->message());
        }

        $course->name = $request->name;

        $file = $request->file('image');

        if ($file) {
        
            $imageName = time() . $file->getClientOriginalName();
            $imagePath = "images/course/$course->id/$imageName";
            $imageDirectory = "images/course/$course->id";

            Storage::disk('public')->deleteDirectory($imageDirectory);
            Storage::disk('public')->put($imagePath, file_get_contents($file));
            $course->image = $imageName;
        }

        if($course->isDirty()) {
            $course->save();
            return redirect()->back()->withSuccess("Course successfully updated");
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {

        $response = Gate::inspect('delete', $course);

        if(empty($response->allowed())) {
            return redirect()->back()->withError($response->message());
        }

        // Delete the directory and all its contents
        $imagePath = "images/course/$course->id";

        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->deleteDirectory($imagePath);
        }

        $course->delete();

        return redirect()->back();
    }
}


