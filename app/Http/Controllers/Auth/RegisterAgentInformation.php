<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\AgentDocument;
use App\Models\AgentSkill;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterAgentInformation extends Controller
{
    public function index()
    {
        $categories = Category::class::all();
        return view('auth.register-agent', compact('categories'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction(); // Start a database transaction

        try {
            // Validate the form data
            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'contact_number' => 'required|string|max:15',
                'gender' => 'required|string|max:10',
                'birthdate' => 'required|date',
                'civil_status' => 'required|string|max:10',
                'selected_skills' => 'required|string|max:255',
                'resume' => 'required|file|mimes:pdf,doc,docx',
                'government_id' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'proof_of_address' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'nbi_clearance' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'medical_cert' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'drug_test' => 'required|file|mimes:jpg,jpeg,png,pdf',
            ]);

            // Create the Agent record
            $agent = Agent::create([
                'user_id' => auth()->id(),
                'full_name' => $validatedData['full_name'],
                'address' => $validatedData['address'],
                'contact_number' => $validatedData['contact_number'],
                'gender' => $validatedData['gender'],
                'birthdate' => $validatedData['birthdate'],
                'civil_status' => $validatedData['civil_status'],
            ]);

            // Create the AgentDocument record using the newly created agent's ID
            AgentDocument::create([
                'agent_id' => $agent->agent_id,
                'resume' => $request->file('resume')->store('documents', 'public'),
                'government_id' => $request->file('government_id')->store('documents', 'public'),
                'proof_of_address' => $request->file('proof_of_address')->store('documents', 'public'),
                'nbi_clearance' => $request->file('nbi_clearance')->store('documents', 'public'),
                'medical_cert' => $request->file('medical_cert')->store('documents', 'public'),
                'drug_test' => $request->file('drug_test')->store('documents', 'public'),
            ]);

            // Save the selected skills
            $this->saveSkills($agent->agent_id, $validatedData['selected_skills']);

            DB::commit(); // Commit the transaction

            return redirect()->route('agent.dashboard')->with('success', 'Agent information saved successfully');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction

            // Log the error message
            Log::error('Failed to save agent data: ' . $e->getMessage());

            // Return back with an error message
            return redirect()->back()->with('error', 'Failed to save agent data: ' . $e->getMessage());
        }
    }



    private function saveSkills($agentId, $skills)
    {
        $selectedSkills = explode(', ', $skills);
        foreach ($selectedSkills as $skillId) {
            try {
                AgentSkill::create([
                    'agent_id' => $agentId,
                    'category_id' => $skillId,
                ]);
                Log::info('Skill with id ' . $skillId . ' saved successfully for agent ' . $agentId);
            } catch (\Exception $e) {
                Log::error('Failed to save skill with id ' . $skillId . ' for agent ' . $agentId . ': ' . $e->getMessage());
            }
        }
    }


    private function saveInformation(Request $request)
    {
        try {
            return Agent::class::create([
                'user_id' => auth()->id(),
                'full_name' => $request->input('full_name'),
                'address' => $request->input('address'),
                'contact_number' => $request->input('contact_number'),
                'gender' => $request->input('gender'),
                'birthdate' => $request->input('birthdate'),
                'civil_status' => $request->input('civil_status'),
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to save agent information: ' . $e->getMessage());
            throw $e;
        }
    }

    private function saveDocuments(Request $request)
    {
        try {
            return AgentDocument::create([
                'agent_id'=> auth()->id(),
                'resume' => $request->file('resume')->store('documents'),
                'government_id' => $request->file('government_id')->store('documents'),
                'proof_of_address' => $request->file('proof_of_address')->store('documents'),
                'nbi_clearance' => $request->file('nbi_clearance')->store('documents'),
                'medical_cert' => $request->file('medical_cert')->store('documents'),
                'drug_test' => $request->file('drug_test')->store('documents'),
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to save agent documents: ' . $e->getMessage());
            throw $e;
        }
    }
}
