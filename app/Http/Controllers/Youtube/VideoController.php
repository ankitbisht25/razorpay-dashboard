<?php

namespace App\Http\Controllers\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Youtube\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest('id')->get();
        return view('youtube.videos.list', compact('videos'));
    }

    public function create()
    {
        return view('youtube.videos.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('video-thumbnail')) {
            $path = $request->file('video-thumbnail')->store('youtube/thumbnail', 'public');
            $request->merge(['thumbnail' => $path]);
        }

        Video::create($request->all());
        return redirect()->back()->with('success', 'Video created successfully.');
    }

    public function show($id)
    {
        $video = Video::find($id);
        return view('youtube.videos.create', compact('video'));
    }

    public function edit($id)
    {
        $video = Video::find($id);
        return view('youtube.videos.create', compact('video'));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('video-thumbnail')) {
            $path = $request->file('video-thumbnail')->store('youtube/thumbnail', 'public');
            $request->merge(['thumbnail' => $path]);
        }
        $Video = Video::findOrFail($id);

        $Video->update($request->all());
        return redirect()->back()->with('success', 'Video updated successfully.');
    }

    public function destroy($id)
    {
        $Video = Video::findOrFail($id);
        if ($Video->thumbnail) {
            \Storage::disk('public')->delete($Video->thumbnail);
        }

        $Video->delete();
        return redirect()->back()->with('success', 'Video deleted successfully.');
    }
}
