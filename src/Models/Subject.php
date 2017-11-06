<?php

namespace Paplow\eTest\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'e_subjects';

    /**
     * Route model binding
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relationship with Question Model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'subject_id');
    }
}
