<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\CV;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $applications = $request->user()
            ->applications()
            ->with(['jobOffer', 'cv'])
            ->latest()
            ->get();

        return response()->json([
            'applications' => $applications,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_offer_id' => ['required', 'exists:job_offers,id'],
            'cv_id' => ['required', 'exists:c_v_s,id'],
        ]);

        // Verify the CV belongs to the user
        $cv = CV::where('id', $request->cv_id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$cv) {
            return response()->json([
                'message' => 'The selected CV does not belong to you',
            ], 403);
        }

        // Verify the job offer exists and is active
        $jobOffer = JobOffer::where('id', $request->job_offer_id)
            ->where('is_active', true)
            ->first();

        if (!$jobOffer) {
            return response()->json([
                'message' => 'The selected job offer does not exist or is not active',
            ], 404);
        }

        // Check if user already applied for this job
        $existingApplication = Application::where('user_id', $request->user()->id)
            ->where('job_offer_id', $request->job_offer_id)
            ->first();

        if ($existingApplication) {
            return response()->json([
                'message' => 'You have already applied for this job',
            ], 422);
        }

        $application = Application::create([
            'user_id' => $request->user()->id,
            'job_offer_id' => $request->job_offer_id,
            'c_v_id' => $request->cv_id,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Application submitted successfully',
            'application' => $application->load(['jobOffer', 'cv']),
        ], 201);
    }
}
