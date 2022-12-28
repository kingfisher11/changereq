<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $table = 'responses';
    protected $primaryKey = 'id';

    protected $fillable = [

        'remarks',
        'attachment',
        'ticket_id',
        'user_id',
        'assigner',
        'currentSts',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assign()
    {
        return $this->belongsTo(User::class, 'assigner', 'id');
    }

    public function responseStatus()
    {
        return $this->belongsTo(Sts::class, 'currentSts', 'id');
    }
}
