<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    use HasFactory;
  protected $fillable=[
        'type',
        'amount',
    ];
    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function donate_schedule()
    {
        return $this->hasMany(donate_schedule::class);
    }

}
