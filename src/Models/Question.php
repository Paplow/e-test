<?php

namespace Paplow\eTest\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
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
    protected $table = 'e_questions';

    /**
     * Relationship with Subject Model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
