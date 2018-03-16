<?php

namespace App\Repositories;

use App\Models\Project;
use Auth;

class TaskRepository
{

    /**
     * @param Project $project
     * @return mixed
     */
    public function checkUser( $project )
    {
        if( $project ) {

            if ( $project->user_id == Auth::user()->id ) {

                return true;

            }

            return abort(403);
        }

        return abort(500);
    }
}