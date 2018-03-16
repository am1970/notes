<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * Properties
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 *
 * Relationships
 * @property User $user
 * @property Task $tasks
 */
class Project extends Model
{
    #region Properties

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title'
    ];

    #endregion

    #region Relationship

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo( User::class );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany( Task::class );
    }

    #endregion
}
