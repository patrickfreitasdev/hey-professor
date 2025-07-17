<?php

namespace App\Models;

use Database\Factories\QuestionFactory;
use Illuminate\Database\Eloquent\{Builder, Model, Prunable, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Question extends Model
{
    /** @use HasFactory<QuestionFactory> */
    use HasFactory;

    use SoftDeletes;
    use Prunable;

    protected $casts = [
        'draft' => 'bool',
    ];

    /** @return HasMany<Vote, $this> */
    public function votes(): HasMany
    {
        /** @var HasMany<Vote, $this> */
        return $this->hasMany(Vote::class);
    }

    /** @return BelongsTo<User, $this> */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the prunable model query.
     *
     * @return Builder<Question>
     */
    public function prunable(): Builder
    {
        return static::where('deleted_at', '<=', now()->subMonth());
    }
}
