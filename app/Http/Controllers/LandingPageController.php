<?php

namespace App\Http\Controllers;

use App\Models\PostedJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    //

    public function index()
    {
        $clientPostController = new ClientPostController();

        $topCities = $clientPostController->topcities();
        $topCategories = $clientPostController->getTopCategories();
        $allJobs = $this->getJobs();

        return view('welcome', compact('topCities', 'topCategories', 'allJobs'));
    }

    public function getJobs()
    {
        $jobs = PostedJobs::all();

        foreach ($jobs as $job) {
            $job->region_name = DB::table('regions')->where('region_id', $job->region)->value('name');
            $job->province_name = DB::table('provinces')->where('province_id', $job->province)->value('name');
            $job->city_name = DB::table('cities')->where('city_id', $job->city)->value('name');
            $job->barangay_name = DB::table('barangays')->where('id', $job->barangay)->value('name');
        }
        return $jobs;
    }

}
