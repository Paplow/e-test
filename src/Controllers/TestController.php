<?php

namespace Paplow\eTest\Controllers;

use Illuminate\Http\Request;
use Paplow\eTest\Models\Subject;

class TestController extends BaseController
{

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
        return view('e-test::e-test.start', compact('subject'));
    }

    /**
     * Start the Test or Exam
     *
     * @param Request $request
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function finish(Request $request, Subject $subject)
    {
        dd($request->all());

        return redirect()->back()->with(etestify(
            'Test successfully submitted.',
            'success'
        ));
    }
}
