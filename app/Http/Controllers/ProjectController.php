<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Projects;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Projects::query();

        $sortFields = request("sort_field", 'created_at');
        $sortDirection = request("sort_direction", "desc");

        if (request("name")) {
            $query->where("name", "like", "%" . request("name") . "%");
        }
        if (request("status")) {
            $query->where("status", request("status"));
        }

        $projects = $query->orderBy($sortFields, $sortDirection)
            ->paginate(10);

        return inertia('Project/Index', [
            "projects" => ProjectResource::collection($projects),
            "queryParams" => request()->query() ?: null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Projects $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Projects $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projects $project)
    {
        //
    }
}
