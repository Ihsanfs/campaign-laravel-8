<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class campaign extends Model
{

    use HasFactory;
    protected $table = 'campaigns';
    // protected $primaryKey = 'slug';
    protected $primaryKey = 'id';

    // protected $fillable = (['']);
    protected $guarded = [];

    // public function getDeadlineAttribute($value)
    // {
    //     $days = Carbon::create($value)->diffInDays();
    //     $months = Carbon::create($value)->diffInMonths()." bulan lagi";
    //     $hours = Carbon::create($value)->diffInHours()." jam lagi";

    //     if($days <= 30) return $days." hari lagi";
    //     if($days < 1) return $hours;

    //     return $months;
    // }


  public function donasi()
  {
      return $this->hasMany(donasi::class);
  }

  public function getRouteKeyName()
  {
      return 'slug';
  }

}
