<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Project;
use App\Models\Admin\Technology;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.project.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();

        return view("admin.project.create", compact("technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $technologies = Technology::all();
        $data = $request->validate([
            "title" => ["required", "unique:projects","min:3", "max:255"],
            "image" => ["image"],
            "technology"=>["technology"],
            "content" => ["required", "min:10"],
        ]);

        if ($request->hasFile("image")){
            $img_path = Storage::put("uploads/projects", $request["image"]);
            $data["image"] = $img_path;
        }

        $newProject = Project::create($data);
        $newProject->save();

        $newProject->technologies()->attach($data["technology"]);
        return redirect()->route("admin.project.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view("admin.project.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("admin.project.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            "title" => ["required", "min:3", "max:255", Rule::unique("projects")->ignore($project->id)],
            "image" => ["image"],
            "content" => ["required", "min:10"],
        ]);

        $project->update($data);

        return redirect()->route("admin.project.show", compact("project"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route("admin.project.index");
    }
}
