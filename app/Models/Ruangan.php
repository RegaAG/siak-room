<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Ruangan extends Model
{
    use HasFactory;
    protected $guarded = [ 'id' ];

    public function bookings()
    {
        return $this->hasMany(Bookings::class, 'room_id');
    }
}
