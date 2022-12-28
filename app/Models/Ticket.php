<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'category_id',
        'ticket_type_id',
        'tracking',
        // 'title',
        'details',
        'attachment',
        'ack',
        'priority_id',
        'status_id',
        // 'ticket_category_id',
        // 'department_id',
        'branch_id'


    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function response()
    {
        return $this->hasMany(Response::class);
    }

    public function ticketStatus()
    {
        return $this->belongsTo(Sts::class, 'status_id', 'id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function ticketCategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }

}
