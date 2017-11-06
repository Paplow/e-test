<?php

namespace Paplow\eTest\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
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
    protected $table = 'e_options';
}
