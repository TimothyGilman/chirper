<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Http\Requests\ChirpStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // return a response with React via Inertia
        return Inertia::render('Chirps/Index', [
            // Load chirps with associated user id and name, ordered in rev chrono
            'chirps' => Chirp::with('user:id,name')->latest()->get(),
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
    public function store(ChirpStoreRequest $request): RedirectResponse
    {
        // validate data and create new chirp
        $validated = $request->validated();
 
        $request->user()->chirps()->create($validated);
 
        return redirect(route('chirps.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChirpStoreRequest $request, Chirp $chirp): RedirectResponse
    {
        // check authorization
        $this->authorize('update', $chirp);
 
        // Validate form values
        $validated = $request->validated();
 
        // Update chirp
        $chirp->update($validated);
 
        // return and redirect to chirps page
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        // delete the specified chirp
        $this->authorize('delete', $chirp);
 
        $chirp->delete();
 
        return redirect(route('chirps.index'));

    }
}
