<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * Properties
 * @property integer $id
 * @property integer $project_id
 * @property string $title
 * @property integer $position
 *
 * Relationships
 * @property Project $project
 *
 */
class Task extends Model
{
    #region Properties

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'title', 'position'
    ];

    #endregion

    #region Relationship

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo( Project::class );
    }

    #endregion
}
