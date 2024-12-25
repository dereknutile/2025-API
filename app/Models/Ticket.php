<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilter;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter(Builder $builder, Queryfilter $filters){
        return $filters->apply($builder);
    }
}
