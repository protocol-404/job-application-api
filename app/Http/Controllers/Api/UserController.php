<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user()->load('skills');

        return response()->json([
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->user()->id),
            ],
            'phone_number' => ['sometimes', 'string', 'max:20', 'nullable'],
        ]);

        $user = $request->user();

        $user->update($request->only([
            'name',
            'email',
            'phone_number',
        ]));

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user->fresh(),
        ]);
    }

    public function skills(Request $request)
    {
        $user = $request->user()->load('skills');

        return response()->json([
            'skills' => $user->skills,
        ]);
    }

    public function addSkill(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $skill = Skill::firstOrCreate(['name' => $request->name]);

        $user = $request->user();

        // Attach skill if not already attached
        if (!$user->skills()->where('skill_id', $skill->id)->exists()) {
            $user->skills()->attach($skill->id);
        }

        return response()->json([
            'message' => 'Skill added successfully',
            'skill' => $skill,
            'user_skills' => $user->skills()->get(),
        ]);
    }

    public function removeSkill(Request $request, Skill $skill)
    {
        $user = $request->user();

        $user->skills()->detach($skill->id);

        return response()->json([
            'message' => 'Skill removed successfully',
            'user_skills' => $user->skills()->get(),
        ]);
    }
}
