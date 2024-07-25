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
        return view('auth.register-agent');
    }

    public function store(Request $request)
    {

        try {


            // Validate the form data
            $request->validate([
                'full_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'contact_number' => 'required|string|max:15',
                'gender' => 'required|string|max:10',
                'birthdate' => 'required|date',
                'civil_status' => 'required|string|max:10',
//                'selected_skills' => 'required|array|max:3',
                'resume' => 'required|file|mimes:pdf,doc,docx',
                'government_id' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'proof_of_address' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'nbi_clearance' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'medical_cert' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'drug_test' => 'required|file|mimes:jpg,jpeg,png,pdf',
            ]);


            // Create the applicant
            $applicant = Agent::class::create([
                'user_id' => auth()->id(),
                'full_name' => $request->input('full_name'),
                'address' => $request->input('address'),
                'contact_number' => $request->input('contact_number'),
                'gender' => $request->input('gender'),
                'birthdate' => $request->input('birthdate'),
                'civil_status' => $request->input('civil_status'),
            ]);


            $agentdocument = AgentDocument::create([
                'agent_id'=> auth()->id(),
                'resume' => $request->file('resume')->store('documents'),
                'government_id' => $request->file('government_id')->store('documents'),
                'proof_of_address' => $request->file('proof_of_address')->store('documents'),
                'nbi_clearance' => $request->file('nbi_clearance')->store('documents'),
                'medical_cert' => $request->file('medical_cert')->store('documents'),
                'drug_test' => $request->file('drug_test')->store('documents'),
            ]);


//            foreach ($documents as $type => $path) {
//                AgentDocument::class::create([
//                    'applicant_id' => auth()->id(),
//                    $type => $path,
//                ]);
//            }

            // Save skills
//            foreach ($request->input('selected_skills') as $skill) {
//                $category = Category::class::firstOrCreate(['category_description' => $skill]);
//                AgentSkill::class::create([
//                    'agent_id' => auth()->id(),
//                    'category_id' => $category->id,
//                ]);
//            }

            // Commit the transaction

            return redirect()->back()->with('success', 'Agent data saved successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Log the error message
            Log::error('Failed to save agent data: ' . $e->getMessage());

            // Return back with an error message
            return redirect()->back()->with('error', 'Failed to save agent data: ' . $e->getMessage());
        }


    }

}
