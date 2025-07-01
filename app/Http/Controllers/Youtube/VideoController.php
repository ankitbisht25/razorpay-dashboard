<?php

namespace App\Http\Controllers\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Youtube\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $clientId = $request->query('client_id');
        $videos = Video::latest('id')->where('client_id', $clientId)->get();
        return view('youtube.videos.list', compact('videos'));
    }

    public function create()
    {
        return view('youtube.videos.create');
    }
    
    public function listing(Request $request)
    {
        try {
            $whereFilters = [];
            if ($request->filters) {
                foreach ($request->filters as $key => $value) {
                    $whereFilters[] = [$key, $value];
                }
            }
            $videos = Video::where($whereFilters)->where('client_id', $request->client_id)->latest('id')->get();

            return response()->json([
                'status' => 'success',
                'data' => $videos
            ], 200);
        } catch (Exception $e) {
            Log::error('Error fetching videos: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong while fetching videos'
            ], 500);
        }
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
