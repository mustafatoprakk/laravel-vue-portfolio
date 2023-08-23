<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render("Projects/Index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return Inertia::render("Projects/Create", compact("skills"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "skill_id" => ["required"],
            "name" => ["required", "min:3"],
            "url" => ["nullable", "min:4"],
            "image" => ["required", "image"]
        ]);

        if ($request->hasFile("image")) {
            $image = $request->file("image")->store("projects");
            Project::create([
                "skill_id" => $request->skill_id,
                "name" => $request->name,
                "url" => $request->url,
                "image" => $image,
            ]);

            return Redirect::route("projects.index");
        }

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
