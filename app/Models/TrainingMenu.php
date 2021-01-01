<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingMenu extends Model
{
    use HasFactory;

    const PART_CHEST = 'chest';
    const PART_BACK = 'back';
    const PART_SHOULDER = 'shoulder';
    const PART_ARMS = 'arms';
    const PART_LEGS = 'legs';
    const PART_ABS = 'abs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'body_part',
    ];

    /**
     * @return HasMany
     */
    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }
}
