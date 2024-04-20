<?php

namespace App\Http\Controllers;
use App\Models\Announcement; // Import modelu Announcement
use Illuminate\Http\Request;


class AnnouncementController extends Controller
{
    public function index()
    {
        $promotedAds = Announcement::promotedAnnouncements(); // Pobierz ogłoszenia
        return view('announcement.index', compact('promotedAds'));
        // return view('announcement.index')->with('promotedAds', $promotedAds);
        // return view('announcement.indexo', ['promotedAds' => $promotedAds]);
    }

    public function list()
    {
        $announcements = Announcement::getAllAnnouncements();
        return view('announcement.index', compact('announcements'));
    }
    

    public function create()
    {
        return view('announcement.create'); // Zwróć widok formularza
    }

    // public function store(Request $request)
    // {
    //     // Walidacja danych
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|decimal',
    //         'image.*' => 'image|max:2048', // Maksymalny rozmiar zdjęcia: 2MB
    //     ]);

    //     // Zapisz ogłoszenie do bazy danych
    //     $announcement = new Announcement();
    //     $announcement->title = $validatedData['title'];
    //     $announcement->description = $validatedData['description'];
    //     $announcement->price = $validatedData['price'];

    //     // Zapisz obrazy
    //     $images = [];
    //     if ($request->hasFile('image')) {
    //         foreach ($request->file('image') as $image) {
    //             $imageName = time() . '_' . $image->getClientOriginalName();
    //             $image->storeAs('public/images', $imageName);
    //             $images[] = $imageName;
    //         }
    //     }
    //     $announcement->images = $images;

    //     $announcement->save();

    //     return redirect()->route('announcement.index');
    // }
}