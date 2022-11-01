<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donate_schedule extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'blood_type_id',
        'amount',
        'verfied',
    ];


    public function BloodType()
    {
        return $this->belongsTo(BloodType::class,'blood_type_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
