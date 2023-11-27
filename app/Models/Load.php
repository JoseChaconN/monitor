<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Load extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes;
    protected $guarded = [];

    public function user_load(): HasOne
    {
        return $this->HasOne(User::class,'id','user_id');
    }
    public function data_load(): HasMany
    {
        return $this->HasMany(DataLoad::class);
    }
}
