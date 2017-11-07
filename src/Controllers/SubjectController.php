<?php

namespace Paplow\eTest\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Paplow\eTest\Models\Question;
use Paplow\eTest\Models\Subject;

class SubjectController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::latest('id')->get();
        return view('e-test::subject.index', compact('subjects'));
    }

    /**
     * Start the Test or Exam
     *
     * @param $subject
     * @return \Illuminate\Http\Response
     */
    public function start($subject)
    {
        $subject = Subject::with('questions', 'questions.option', 'questions.option.answer')
            ->whereSlug($subject)->first();
        return view('e-test::subject.start', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|unique:subjects'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Subject::create($data);

        return redirect()->back()->with(etestify(
            'Successfully created '.$request->name,
            'success'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $questions = Question::whereSubjectId($subject->id)->get();
        return view('e-test::subject.show', compact('questions', 'subject'));
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
