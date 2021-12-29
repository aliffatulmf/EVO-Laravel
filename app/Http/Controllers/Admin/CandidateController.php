<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Candidate\StoreCandidateRequest;
use App\Http\Requests\Admin\Candidate\UpdateCandidateRequest;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Candidate::all();
        return view('admin.candidate.show-candidate', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidate.add-candidate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidateRequest $request)
    {
        $exp = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/si';
        $video = array();
        preg_match($exp, $request['video'], $video);
        
        Candidate::create([
            'number' => $request['number'],
            'position' => $request['position'],
            'address' => $request['address'],
            'education' => $request['education'],
            'name' => $request['name'],
            'image' => $request['image'],
            'video' => $video[1],
            'description' => $request['description']
        ]);

        return redirect()
            ->back()
            ->with('message', sprintf('Successfully added %s candidate.', $request['name']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidateRequest  $request
     * @param  \App\Models\Admin\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate, $id)
    {
        $data = $candidate->findOrFail($id);
        $data->delete();

        return redirect()
            ->back()
            ->with('message', sprintf('Successfully deleted %s.', $data->name));
    }
}
