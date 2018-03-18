<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Task;
use App\Repositories\ProjectRepository;
use Auth;

/**
 * Class ProjectController
 *
 * Properties
 * @property ProjectRepository $project
 */
class ProjectController extends Controller
{

    /**
     * @var ProjectRepository
     */
    private $project;

    /**
     * ProjectController constructor.
     */
    public function __construct()
    {
        $this->project = new ProjectRepository();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('projects.projects', [
            'projects' => Auth::user()->projects
        ]);
    }

    /**
     * @param ProjectRequest $request
     * @return array
     */
    public function store(ProjectRequest $request)
    {
        return [ 'project' => (new Project())->create( $request->all() ) ];
    }

    /**
     * @param Project $project
     * @param ProjectRequest $request
     * @return array
     */
    public function edit(Project $project, ProjectRequest $request)
    {
        if( $this->project->checkUser( $project ) ) {
            return ['project' => $project->update($request->all())];
        }

        return [ 'project' => false ];
    }

    /**
     * @param Project $project
     * @return array
     * @throws \Exception
     */
    public function delete(Project $project)
    {
        if( $this->project->checkUser( $project ) ) {
            if( $tasks = $project->tasks ) {

                /** @var \Illuminate\Database\Eloquent\Relations\HasMany $tasks */
                $tasks->each(function ($task) {

                    /** @var Task $task */
                    return $task->delete();
                });
            }

            return [ 'project' => $project->delete() ];
        }

        return [ 'project' => false ];
    }
}
