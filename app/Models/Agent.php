<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $primaryKey = 'agent_id';

    protected $fillable = [
        'user_id',
        'full_name',
        'address',
        'contact_number',
        'gender',
        'birthdate',
        'civil_status',
        'application_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasOne(AgentDocument::class, 'agent_id', 'user_id');
    }
}
