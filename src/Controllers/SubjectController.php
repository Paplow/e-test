<?php

namespace Paplow\eTest\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Paplow\eTest\Models\Question;
use Paplow\eTest\Models\Subject;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class SubjectController extends BaseController
{
    private $htmlBuilder;

    public function __construct(Builder $htmlBuilder)
    {
        $this->htmlBuilder = $htmlBuilder;
//        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('e-test::subject.index');
    }

    /**
     * Get the resoure to display in the Index
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIndexData()
    {
        return DataTables::collection(
            Subject::select(['name', 'duration', 'slug', 'created_at'])->latest('id')->get()
        )
            ->editColumn('name', function (Subject $subject) {
                return '<a href="'.route('subject.show', $subject->slug).'">'.$subject->name.'</a>';
            })
            ->editColumn('duration', '{{$duration}}mins')
            ->editColumn('date', function (Subject $subject){
                return $subject->created_at->format('d M, Y');
            })
            ->addColumn('options', function (Subject $subject) {
                return '<a href="'.route("test.start", $subject->slug).'" data-toggle="tooltip" data-placement="top" title="Start Test">
                                <span class="glyphicon glyphicon-play"></span></a> &middot;
                            <a href="'.route("answer.index", $subject->slug).'" data-toggle="tooltip" data-placement="top" title="View Answers">
                                <span class="glyphicon glyphicon-eye-open"></span></a> &middot;
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span></a> &middot;
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Delete">
                                <span class="glyphicon glyphicon-remove"></span></a>';
            })
            ->rawColumns(['name', 'options'])
            ->make(true);
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
            'name' => 'required|string|min:3|unique:e_subjects',
            'duration' => 'required|integer'
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
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('e-test::question.show', compact('subject'));
    }

    /**
     * Get the resoure to display in the Show
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     */
    public function getShowData(Subject $subject)
    {
        return DataTables::collection(
            Question::select(['id', 'question', 'type'])->whereSubjectId($subject->id)->latest('id')->get()
        )
            ->addColumn('options', function (Question $question) use ($subject) {
                return '<a href="'.route('question.show', [$subject->slug, $question->id]).'" data-toggle="tooltip" data-placement="top" title="Start">
                                <span class="glyphicon glyphicon-plus"></span></a> &middot; 
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span></a> &middot;
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Delete">
                                <span class="glyphicon glyphicon-remove"></span></a>';
            })
            ->rawColumns(['options'])
            ->make(true);
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
