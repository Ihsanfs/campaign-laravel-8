<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donasi extends Model
{
    use HasFactory;
    protected $table = 'donasis';

    protected $guarded = [];

    // protected $fillable = [];

    public function campaign()
    {
        return $this->belongsTo(campaign::class);
    }
}
