<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $table = 'priorities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
