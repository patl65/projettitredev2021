<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Job;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Http\Requests\JobRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View as ViewContract;

class JobController extends Controller
{
    /**
     * @return Application|Factory|ViewContract|View
     */
    public function index(): View
    {
        // $jobs = Job::all();
        $jobs = Job::with('user')->orderBy('updated_at', 'desc')->paginate(7);

        return view('pages.job.index', ['jobs' => $jobs]);
    }

    /**
     * @return Application|Factory|ViewContract|View
     */
    public function create()
    {
        return view('pages.job.create');
    }

    /**
     * @param JobRequest $request
     * @return RedirectResponse
     */
    public function store(JobRequest $request): RedirectResponse
    {
        //$job = Job::create($request->validated());
        //create qui envoit l'input directement sans être adapté : ex slug ou booléen en string       

        $title = $request->input('title');
        $job = Job::create([
            'user_id' => auth()->user()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'contract' => $request->input('contract'),
            'job' => $request->input('job'),
            'visible' => $request->input('visible') ? true : false,
            'closed' => $request->input('closed') ? true : false
        ]);

        return redirect()
            ->route('job.show', $job->slug)
            ->with('success', "Offre d'emploi créée");
    }

    /**
     * @param Job $job
     * @return Application|Factory|ViewContract|View
     */
    public function show(Job $job): View
    {
        return view('pages.job.show', ['job' => $job]);
    }

    /**
     * @param Job $job
     * @return Application|Factory|ViewContract|View
     */
    public function edit(Job $job): View
    {
        // return view('pages.job.edit', ['job' => $job]);
        return view('pages.job.update', ['job' => $job]);

    }

    /**
     * @param JobRequest $request
     * @param Job $job
     * @return RedirectResponse
     */
    public function update(JobRequest $request, Job $job): RedirectResponse
    {
        // $job->update($request->validated());
        //update qui envoit l'input directement sans être adapté : ex slug ou booléen en string       

        $title = $request->input('title');
        $job->update([
            'user_id' => auth()->user()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'contract' => $request->input('contract'),
            'job' => $request->input('job'),
            'visible' => $request->input('visible') ? true : false,
            'closed' => $request->input('closed') ? true : false
        ]);

        return redirect()
            ->route('job.show', $job->slug)
            ->with('success', "Offre d'emploi mise à jour");
    }

    /**
     * @param Job $job
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();
        return redirect()
            ->route('job.index')
            ->with('success', "Offre d'emploi supprimée");
    }
}
