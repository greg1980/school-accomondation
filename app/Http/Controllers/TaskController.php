<?php

namespace App\Http\Controllers;

use App\task;
use Illuminate\Http\Request;
use Faker\Generator;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(Task::all()->jsonSerialize(), Response::HTTP_OK);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Generator $faker)
    {
        // create fake data using faker instance
        $task = new task();
        $task->title = $faker->sentence(1);
        $task->note = $faker->sentence(1);
        $task->priority = $faker->boolean ? 'low'  : 'high' ;
        $task->save();

        return response($task->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new task();
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->note = $request->note;
        $task->save();

        return response($task->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        Task::destroy($id);
        return response(null, Response::HTTP_OK);
    }
    

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\task  $task
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(task $task)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\task  $task
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(task $task)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\task  $task
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, task $task)
    // {
    //     //
    // }
}
