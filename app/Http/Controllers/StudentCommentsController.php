<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        return response()->json($student->comments()->with('user')->get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
        $comment = ['body' => $request->input('body'), 'user_id' => $request->user()->id];
        return response()->json($student->comments()->create($comment), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, Comment $comment)
    {
        if($comment->student_id == $student->id) {
            return response()->json($comment, Response::HTTP_OK);
        }

        return redirect()->route('api.fallback.404');
    }

}
