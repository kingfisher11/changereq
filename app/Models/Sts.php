<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sts extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];


    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
