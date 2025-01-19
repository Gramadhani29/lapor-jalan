<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location',
        'description',
        'photo',
        'status',
        'user_id',
    ];

    /**
     * Relationship: Report belongs to User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
