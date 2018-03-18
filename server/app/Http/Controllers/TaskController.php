<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Repositories\TaskRepository;

/**
 * Class TaskController
 *
 * Properties
 * @property TaskRepository $task
 */
class TaskController extends Controller
{
    /**
     * @var TaskRepository
     */
    public $task;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->task = new TaskRepository();
    }

    /**
     * @param TaskRequest $request
     * @return array
     */
    public function store(TaskRequest $request)
    {
        if( $this->task->checkUser( (new Project())->find( $request->project_id ) ) ) {

            return [ 'task' => (new Task())->create( $request->all() ) ];

        }

        return [ 'task' => false ];
    }

    /**
     * @param Task $task
     * @param TaskRequest $request
     * @return array
     */
    public function edit(Task $task, TaskRequest $request)
    {
        if( $this->task->checkUser( $task->project ) ) {

            return [ 'task' => $task->update( $request->all() ) ];

        }

        return [ 'task' => false ];
    }

    /**
     * @param Task $task
     * @return array
     * @throws \Exception
     */
    public function delete(Task $task)
    {
        if( $this->task->checkUser( $task->project ) ) {

            return [ 'task' => $task->delete() ];

        }

        return [ 'task' => false ];
    }

}
