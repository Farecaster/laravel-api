<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TeacherResource(Teacher::all());
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
        return new TeacherResource(Teacher::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the teacher with the given ID from the database
        $teacher = Teacher::find($id);

        // Check if the teacher exists
        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        // Return the teacher data
        return new TeacherResource($teacher);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return new TeacherResource($teacher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response(null, 204);
    }
}
