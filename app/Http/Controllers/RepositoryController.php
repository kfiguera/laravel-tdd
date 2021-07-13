<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryRequest;
use App\Models\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function index(Request $request)
    {
        $repositories = $request->user()->repositories;
        return view('repositories.index', compact('repositories'));
    }

    public function store(RepositoryRequest $request)
    {
        $request->user()->repositories()->create($request->all());

        return redirect()->route('repositories.index');
    }

    public function update(RepositoryRequest $request, Repository $repository)
    {
        $repository->update($request->all());

        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }
        return redirect()->route('repositories.edit', $repository);
    }

    public function destroy(Request $request, Repository $repository)
    {
        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }

        $repository->delete();

        return redirect()->route('repositories.index');
    }
}
