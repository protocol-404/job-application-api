<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index()
    {
        $jobOffers = JobOffer::where('is_active', true)
            ->latest()
            ->paginate(10);

        return response()->json($jobOffers);
    }

    public function show(JobOffer $jobOffer)
    {
        return response()->json($jobOffer);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'requirements' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $jobOffer = JobOffer::create([
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'location' => $request->location,
            'is_active' => $request->is_active ?? true,
            'recruiter_id' => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Job offer created successfully',
            'job_offer' => $jobOffer,
        ], 201);
    }

    public function update(Request $request, JobOffer $jobOffer)
    {
        // Check if the authenticated user is the recruiter who created this job offer
        if ($request->user()->id !== $jobOffer->recruiter_id) {
            return response()->json([
                'message' => 'You are not authorized to update this job offer',
            ], 403);
        }

        $request->validate([
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'requirements' => ['sometimes', 'string'],
            'location' => ['sometimes', 'string', 'max:255'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $jobOffer->update($request->only([
            'title',
            'description',
            'requirements',
            'location',
            'is_active',
        ]));

        return response()->json([
            'message' => 'Job offer updated successfully',
            'job_offer' => $jobOffer->fresh(),
        ]);
    }

    public function destroy(Request $request, JobOffer $jobOffer)
    {
        // Check if the authenticated user is the recruiter who created this job offer
        if ($request->user()->id !== $jobOffer->recruiter_id) {
            return response()->json([
                'message' => 'You are not authorized to delete this job offer',
            ], 403);
        }

        $jobOffer->delete();

        return response()->json([
            'message' => 'Job offer deleted successfully',
        ]);
    }

    public function applications(Request $request, JobOffer $jobOffer)
    {
        // Check if the authenticated user is the recruiter who created this job offer
        if ($request->user()->id !== $jobOffer->recruiter_id) {
            return response()->json([
                'message' => 'You are not authorized to view applications for this job offer',
            ], 403);
        }

        $applications = $jobOffer->applications()
            ->with(['user:id,name,email,phone_number', 'cv'])
            ->paginate(10);

        return response()->json($applications);
    }
}
