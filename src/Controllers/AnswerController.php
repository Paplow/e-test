<?php

namespace Paplow\eTest\Controllers;

use App\JobApplication;
use Illuminate\Http\Request;
use Paplow\eTest\Models\Subject;

class AnswerController extends BaseController
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::latest('id')->get();
        return view('e-test::answer.index', compact('subjects'));
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $users = JobApplication::latest('id')->get();
        return view('e-test::answer.show', compact('subject','users'));
    }

    /**
     * @param Subject $subject
     * @param JobApplication $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display(Subject $subject, JobApplication $user)
    {
        return view('e-test::answer.display', compact('subject','user'));
    }

}
