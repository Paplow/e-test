<?php

namespace Paplow\eTest\Controllers;

use App\JobApplication;
use Illuminate\Http\Request;
use Paplow\eTest\Models\Answer;
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
        $user_id = JobApplication::whereEmail($request->get('user_id'))->first()->id;
        try {
            foreach (array_except($request->all(), '_token') as $item => $value) {
                Answer::create([
                    'answer' => $value,
                    'user_id' => $user_id,
                    'option_id' => $item,
                ]);
            }
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }

        return redirect()->back()->with(etestify(
            'Test successfully submitted.',
            'success'
        ));
    }
}
