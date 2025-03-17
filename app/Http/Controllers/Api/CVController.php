<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CVController extends Controller
{
    public function index(Request $request)
    {
        $cvs = $request->user()->cvs()->latest()->get();

        return response()->json([
            'cvs' => $cvs,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cv' => [
                'required',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120', // 5MB max
            ],
        ]);

        $file = $request->file('cv');
        $originalFilename = $file->getClientOriginalName();

        // Store file in storage/app/public/cvs
        $path = $file->store('cvs', 'public');

        $cv = $request->user()->cvs()->create([
            'file_path' => $path,
            'original_filename' => $originalFilename,
        ]);

        return response()->json([
            'message' => 'CV uploaded successfully',
            'cv' => $cv,
        ], 201);
    }

    public function destroy(Request $request, CV $cv)
    {
        // Check if the CV belongs to the authenticated user
        if ($request->user()->id !== $cv->user_id) {
            return response()->json([
                'message' => 'You are not authorized to delete this CV',
            ], 403);
        }

        // Check if CV is being used in any applications
        if ($cv->applications()->exists()) {
            return response()->json([
                'message' => 'Cannot delete CV. It is being used in job applications.',
            ], 422);
        }

        // Delete the file
        Storage::disk('public')->delete($cv->file_path);

        // Delete the database record
        $cv->delete();

        return response()->json([
            'message' => 'CV deleted successfully',
        ]);
    }
}
