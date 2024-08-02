<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\Address\Entities\Barangay;
use Yajra\Address\HasAddress;

class PostedJobs extends Model
{
    use HasFactory, HasAddress;

    protected $primaryKey = 'job_id';

    protected $fillable = [
        'job_title',
        'job_description',
        'salary',
        'image',
        'region',
        'province',
        'city',
        'barangay',
        'category_id',
        'status',
        'user_id',
        'agent_id',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay', 'id');
    }

}
