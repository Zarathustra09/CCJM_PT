<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'agent_id',
        'category_description'
    ];

    public function applicantSkills()
    {
        return $this->hasMany(AgentSkill::class, 'category_id', 'category_id');
    }
}
