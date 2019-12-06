<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\NewQuestionRequest;
use App\Notifications\NewQuestion;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->model = Relation::getMorphedModel(
            request()->route()->parameter('model')
        );
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewQuestionRequest $request, $questionable_type, $questionable_id)
    {
        //
        $data = $request->only('title', 'content');

        $instance = $questionable_type::findOrFail($questionable_id);

        $question = $instance->questions()->create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => auth()->user()->id
        ]);

        $instance->author->notify(new NewQuestion($question));

        session()->flash('success', 'Your questions was posted successfully!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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