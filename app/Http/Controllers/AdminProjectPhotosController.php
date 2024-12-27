<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Image;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminProjectPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        // $media = $project->getMedia();

        $media = Image::where('project_id', $project->id)->get();

        return view('admin.projects.photos.index', [
            'media' => $media,
            'project' => $project
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
    public function store(Request $request, Project $project)
    {
        $data = $this->validate($request, [
            'photos' => 'required',
            'photos.*' => 'mimes:png,jpg,jpeg|max:4096'
        ]);

        if (Image::checkFileSizes($request->file('photos'))) {
            return back()->withErrors(['error' => 'File(s) size must not exceed 4MB']);
        }
        
        foreach ($data['photos'] as $photo) {
            
            $url = cloudinary()->upload($photo
            ->getRealPath(), ['folder' => 'moreart',])->getSecurePath();
            
            $public_id = Image::extractPublicId($url);
            
            Image::create([
                'url' => $url,
                'public_id' => $public_id,
                'project_id' => $project->id
            ]);
        }
        return redirect()->route('projects.photos.index', $project->id);
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
    public function destroy(Project $project, $mediaId)
    {
        // $media = $project->getMedia()->find($mediaId);
        // $media->delete();

        $image= Image::find($mediaId);

        Cloudinary::destroy($image->public_id);

        $image->delete();

        return redirect()->back();
    }
}
