<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use App\Models\User;
use App\Models\Category;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['instructor', 'category'])->get();
        return view('course.index', [
            'courses' => $courses,
        ]);
    }

    public function create()
    {
        $instructors = User::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('course.create', [
            'instructors' => $instructors,
            'categories' => $categories,
        ]);
    }

    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->validated());
        session()->flash('success', 'Registro creado exitosamente');
        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        $instructors = User::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('course.edit', [
            'course' => $course,
            'instructors' => $instructors,
            'categories' => $categories,
        ]);
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->update($request->validated());
        session()->flash('success', 'Registro actualizado exitosamente');
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        session()->flash('success', 'Registro eliminado exitosamente');
        return redirect()->route('courses.index');
    }
}