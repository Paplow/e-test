<?php

namespace Paplow\eTest\Controllers;

use App\User;
use Illuminate\Http\Request;
use Paplow\eTest\Models\Subject;
use Yajra\DataTables\Facades\DataTables;

class AnswerController extends BaseController
{
    public function __construct()
    {
//        $this->middleware('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function index(Subject $subject)
    {
        return view('e-test::answer.index', compact('subject'));
    }

    /**
     * Get the resource to display on Index
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIndexData()
    {
        return DataTables::collection(
            User::select(['id', 'name', 'email'])->latest('id')->get()
        )
            ->addColumn('options', function (User $user) {
                return '<a href=""><span class="glyphicon glyphicon-edit"></span></a> &middot;
                                <a href=""><span class="glyphicon glyphicon-remove"></span></a>';
            })
            ->rawColumns(['name', 'options'])
            ->make(true);
    }

    /**
     * @param Subject $subject
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Subject $subject, User $user)
    {
        return view('e-test::answer.show', compact('subject','user'));
    }

}
