<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        Gate::authorize('viewAny', Task::class);
        $tasks = Task::where('user_id', auth()->id());
        $filter = $request->input('filter');
        $itemsPerPage = (int) $request->input('itemsPerPage', 5);

        if ($filter === 'complete') {
            $tasks->complete();
        } elseif ($filter === 'incomplete') {
            $tasks->incomplete();
        } else {
            $tasks->default();
        }


        $tasks = $tasks->paginate($itemsPerPage);

        return view('tasks.index', compact('tasks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        Gate::authorize('create', Task::class);
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        Gate::authorize('create', Task::class);
        $validated = $request->validated();
        Task::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        Gate::authorize('view', $task);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        Gate::authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task): \Illuminate\Contracts\Foundation\Application|RedirectResponse|Redirector|Application
    {
        Gate::authorize('update', $task);
        $validated = $request->validated();
        $task->update([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);

        return redirect(route('tasks.index'));
    }
}
