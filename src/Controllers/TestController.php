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
        if (is_null(JobApplication::whereEmail(request('email'))->first()))
            return abort(404);

        $subject = Subject::with('questions', 'questions.option', 'questions.option.answer')
            ->whereSlug($subject)->first();
        return view('e-test::e-test.start', compact('subject'));
    }

    /**
     * Finish the Test or Exam
     *
     * @param Request $request
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function finish(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:job_applications'
        ]);

        try {
            $user_id = JobApplication::whereEmail($request->get('email'))->first()->id;
            foreach (array_except($request->all(), ['_token', 'email']) as $item => $value) {
                Answer::create([
                    'answer' => (is_array($value)) ? implode(',', $value) : $value,
                    'user_id' => $user_id,
                    'option_id' => $item
                ]);
            }

            flash()->success('Test successfully submitted.');
            return redirect()->route('index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(etestify($e->getMessage(), 'error'));
        }
    }
}
