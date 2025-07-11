<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the extracurricular activities.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all extracurricular activities
        $ekstrakulikulers = Ekstrakulikuler::all();

        return view('superadmin.ekstrakulikuler', compact('ekstrakulikulers'));
    }

    /**
     * Show the form for creating a new extracurricular activity.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('superadmin.createekstrakulikuler');
    }

    public function show(Ekstrakulikuler $ekstrakulikuler)
{
    // Return the view for showing a specific extracurricular activity
    return view('superadmin.showekstrakulikuler', compact('ekstrakulikuler'));
}


    /**
     * Store a newly created extracurricular activity in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'namaekstrakulikuler' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        'gambar' => 'required|min:3', // At least 3 images required
    ]);

    $imagePaths = [];
    if ($request->hasFile('gambar')) {
        foreach ($request->file('gambar') as $image) {
            $imagePaths[] = $image->store('images/ekstrakulikuler', 'public');
        }
    }

    Ekstrakulikuler::create([
        'namaekstrakulikuler' => $request->namaekstrakulikuler,
        'deskripsi' => $request->deskripsi,
        'gambar' => json_encode($imagePaths), // Store image paths in JSON format
    ]);

    return redirect()->route('ekstrakulikuler.index')->with('success', 'Ekstrakurikuler created successfully!');
}

    /**
     * Show the form for editing the specified extracurricular activity.
     *
     * @param \App\Models\Ekstrakulikuler $ekstrakulikuler
     * @return \Illuminate\View\View
     */
    public function edit(Ekstrakulikuler $ekstrakulikuler)
    {
        return view('superadmin.editekstrakulikuler', compact('ekstrakulikuler'));
    }

    /**
     * Update the specified extracurricular activity in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ekstrakulikuler $ekstrakulikuler
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ekstrakulikuler $ekstrakulikuler)
    {
        // Validate the incoming request
        $request->validate([
            'superAdmin_id' => 'nullable|integer',
            'namaekstrakulikuler' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar' => 'nullable|min:3',
        ]);

        // Handle image uploads (if any)
        $imagePaths = json_decode($ekstrakulikuler->gambar, true); // Existing image paths
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $imagePaths[] = $image->store('images/ekstrakulikuler', 'public');
            }
        }

        // Update the extracurricular activity
        $ekstrakulikuler->update([
            'superAdmin_id' => $request->superAdmin_id ?? 1,
            'namaekstrakulikuler' => $request->namaekstrakulikuler,
            'deskripsi' => $request->deskripsi,
            'gambar' => json_encode($imagePaths), // Update image paths
        ]);

        return redirect()->route('superadmin.ekstrakulikuler')->with('success', 'Ekstrakurikuler updated successfully!');
    }

    /**
     * Remove the specified extracurricular activity from storage.
     *
     * @param \App\Models\Ekstrakulikuler $ekstrakulikuler
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ekstrakulikuler $ekstrakulikuler)
    {
        // Delete the images from storage
        $images = json_decode($ekstrakulikuler->gambar, true);
        foreach ($images as $image) {
            if (Storage::exists('public/' . $image)) {
                Storage::delete('public/' . $image);
            }
        }

        // Delete the extracurricular activity record
        $ekstrakulikuler->delete();

        return redirect()->route('superadmin.ekstrakulikuler')->with('success', 'Ekstrakurikuler deleted successfully!');
    }
}
