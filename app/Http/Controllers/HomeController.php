<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\View\View;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(): View
    {
        //render view with posts
        return view('home.index');
    }

    public function works(Request $request): View
    {
        $projects = Project::latest()->get();
        
        $category_id = $request->query('category');
    
    // Fetch projects, filtered by category if selected
    if ($category_id) {
        $projects = Project::where('category_id', $category_id)->latest()->get();
    } else {
        $projects = Project::latest()->get();
    }
        foreach ($projects as $project) {
            $firstMedia = $project->image->first();
            if ($firstMedia) {
                $project->first_image_url = $firstMedia->url;
            } else {
                $project->first_image_url = null; // Set a default or handle if no image is available
            }
        }

        $categories = Category::all();

        return view('home.works', compact('projects', 'categories'));
    }

    public function worksDetail(Project $project): View
    {
        $images = $project->image;
        // foreach ($images as $image) {
        //     $images[] = parse_url($image->getUrl())['path'];
        // }

        $crews = $project->crews;
        // dd($crews);

        return view('home.worksDetail', ['project' => $project, 'crews' => $crews, 'images' => $images]);
    }

    public function about(): View
    {
        //render view with posts
        return view('home.about');
    }

    public function sendEmail(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

        $recipient = 'rascalhensind@gmail.com';
        $sender = $validatedData['email'];
        $message = $validatedData['message'];

        // Send email
        Mail::to($recipient)->send(new ContactEmail($message, $sender));

        // Redirect back with a success message
        return redirect()->route('home.about')->with('success', 'Your message has been sent successfully!');
    }
}
