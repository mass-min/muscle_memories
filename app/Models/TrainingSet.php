<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingSet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_id',
        'reps',
        'weight',
        'interval_seconds',
    ];

    /**
     * @return BelongsTo
     */
    public function training()
    {
        return $this->belongsTo('App\Models\Training');
    }
}
