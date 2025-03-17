<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_offer_id',
        'c_v_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }

    public function cv()
    {
        return $this->belongsTo(CV::class, 'c_v_id');
    }
}
