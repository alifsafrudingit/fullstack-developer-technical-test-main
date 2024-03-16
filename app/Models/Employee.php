<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
        'nip',
        'year_birth',
        'address',
        'phone_number',
        'religion',
        'status',
        'id_card_photo',
        'position_id'
    ];
    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
