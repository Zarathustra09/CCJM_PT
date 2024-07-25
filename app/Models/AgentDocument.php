<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentDocument extends Model
{
    use HasFactory;

    protected $primaryKey = 'document_id';

    protected $fillable = [
        'agent_id',
        'resume',
        'government_id',
        'proof_of_address',
        'nbi_clearance',
        'medical_cert',
        'drug_test',
    ];

    public function applicant()
    {
        return $this->belongsTo(Agent::class);
    }
}
