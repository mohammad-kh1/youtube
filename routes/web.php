<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Models\Video;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name("home");

Route::middleware(["auth"])->group(function () {
    Route::get('/delete-video', function () {
        return Inertia::render('DeleteVideo');
    })->name("deleteVideo");
    Route::get('/add-video', function () {
        return Inertia::render('AddVideo');
    })->name("addVideo");

    Route::post("/uploadVideo", function (Request $request) {
        $request->validate([
            "title" => "required",
            "thumbnail" => "required|image",
            "video" => "required|max:10240"
        ]);

        $thumnial = $request->file("thumbnail");
        $video = $request->file("video");
        Storage::disk("public")->put("thumbnails/", $thumnial);
        Storage::disk("public")->put("videos/", $video);

        Video::create(["title" => $request->get("title"), "thumbnail" => $thumnial->getClientOriginalName(), "video" =>$video->getClientOriginalName() , "publisher_id" => auth()->user()->id]);
    });
});

Route::get("/videos/{id}", [VideoController::class, "show"])->name("video.show");

require __DIR__ . '/auth.php';
