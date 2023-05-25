<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $examtypes;

    public function __construct()
    {
        $this->examtypes=ExamType::all();
    }

    public function index()
    {
        return view('HMM.examCategory.examtype.index',['examtypes'=>$this->examtypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('HMM.examCategory.examtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        if(ExamType::create($request->all())){
            return redirect()->route('exam.examtype.index');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function show(ExamType $examType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $examtype = $this->examtypes->find($id);
    if (!$examtype) {
        abort(404);
    }
    return view('HMM.examCategory.examtype.edit', ['examtype' => $examtype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, $id)
    {
        //
        $examtype=$this->examtypes->find($id);
        $examtype->update($request->all());
        return redirect()->route('exam.examtype.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamType  $examType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $examtype=$this->examtypes->find($id);
        $examtype->delete();
        return redirect()->route('exam.examtype.index');
    }
}
