<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ticket_id',
        'status_id',
        'response_id',

    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
