<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = ['time_in', 'time_out', 'qty_child', 'qty_old', 'home_id', 'name', 'phone'];

    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
