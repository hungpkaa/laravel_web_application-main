<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    // GET /api/projects
    public function index(Request $request)
    {
        $query = Project::query();

        $sortField = $request->query('sort_field', 'created_at');
        $sortDirection = $request->query('sort_direction', 'desc');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->query('name') . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->query('status'));
        }

        $projects = $query->orderBy($sortField, $sortDirection)
            ->paginate($request->query('per_page', 10));

        return ProjectResource::collection($projects)
            ->additional([
                'meta' => [
                    'query' => $request->query(),
                ],
            ]);
    }

    // POST /api/projects
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        // Image upload is typically multipart; for API keep it simple (expect image_path)
        $project = Project::create($data);
        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(201);
    }

    // GET /api/projects/{project}
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    // PUT/PATCH /api/projects/{project}
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->update($data);
        return new ProjectResource($project);
    }

    // DELETE /api/projects/{project}
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(null, 204);
    }
}
