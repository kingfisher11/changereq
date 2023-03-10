<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'code',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }


}
