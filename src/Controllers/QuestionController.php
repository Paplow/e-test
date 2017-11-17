<?php

namespace Paplow\eTest\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Paplow\eTest\Models\Question;
use Paplow\eTest\Models\Subject;

class QuestionController extends BaseController
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'question' => 'required|string|min:5',
            'type' => 'string', Rule::in(['text', 'checkbox', 'radio'])
        ]);

        $subject->questions()->create($request->all());
        return redirect()->back()->with(etestify(
            'Successfully created!',
            'success'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject, Question $question)
    {
        return view('e-test::question.index', compact('subject', 'question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
