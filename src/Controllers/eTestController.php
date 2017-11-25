<?php

namespace Paplow\eTest\Controllers;

use Illuminate\Http\Request;

class eTestController extends BaseController
{
    public function __construct()
    {
//        $this->middleware('admin');
    }

    /**
     * Display the index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('e-test::e-test.index');
    }

}
