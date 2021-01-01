<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Training extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_menu_id',
    ];

    /**
     * @return BelongsTo
     */
    public function workout(): BelongsTo
    {
        return $this->belongsTo(Workout::class);
    }

    /**
     * @return BelongsTo
     */
    public function trainingMenu(): BelongsTo
    {
        return $this->belongsTo(TrainingMenu::class);
    }

    /**
     * @return HasMany
     */
    public function trainingSets(): HasMany
    {
        return $this->hasMany(TrainingSet::class);
    }
}
