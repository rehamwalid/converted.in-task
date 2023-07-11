<?php

namespace App\Http\Controllers;

use _34ml\EcommerceProduct\Models\Category;
use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = QueryBuilder::for(Task::class)
            ->paginate(10);

        return view('tasks-index', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks-create',['users'=>User::all(),'admins' => Admin::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => ['required', 'string'],
            'description'           => ['required', 'string'],
            'assigned_to_id'        => ['required', 'exists:users,id'],
            'assigned_by_id' => ['sometimes', 'exists:admins,id'],
        ]);

        Task::create($validated);

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
