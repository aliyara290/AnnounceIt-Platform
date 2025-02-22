<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Http\Requests\StoreAnnouncementsRequest;
use App\Http\Requests\UpdateAnnouncementsRequest;
use App\Models\Category;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcements::paginate(8);
        return view('front.announcements', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('front.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementsRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image-ann')) {
            $imagePath = $request->file('image-ann')->store('announcements', 'public');
        } else {
            echo 'Failed to upload image';
        }
        $userId= Auth::id() ?: 1;
        Announcements::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'user_id' => $userId,
        ]);
         return redirect()->route('front.announcements');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $announcement = Announcements::findOrFail($id);
        $comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
            ->where('announce_id', $announcement->id)
            ->orderByDesc('created_at')
            ->select('comments.*', 'users.name')
            ->paginate(2);
        $totalComments = $comments->count();
        return view('front.show', compact('announcement', 'comments', 'totalComments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcements $announcements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementsRequest $request, Announcements $announcements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcements $announcements)
    {
        //
    }
}
