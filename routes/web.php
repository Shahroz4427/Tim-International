<?php

use App\Http\Controllers\InquirySubmissionController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Inventory;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $gallery = Gallery::first();
    
    return view('frontend.home', compact('gallery'));
})->name('home');


Route::get('/inventory', function () {
    $cars = Inventory::orderBy('id', 'desc')->get();
    return view('frontend.inventory', ['cars' => $cars]);
})->name('inventory');

Route::get('/inventory/detail/{id}', function ($id) {
    $car = Inventory::findOrFail($id);
    return view('frontend.inventory-detail', ['car' => $car]);
})->name('inventory.detail');

Route::get('/services', function () {
    $services = Service::orderBy('id', 'desc')->get();
    return view('frontend.services', ['services' => $services]);
})->name('services');

Route::get('/service/detail/{id}', function ($id) {
    $service = Service::findOrFail($id);
    return view('frontend.service-detail', ['service' => $service]);
})->name('service.detail');

Route::get('/blogs', function () {
    $blogs = Blog::orderBy('id', 'desc')->get();
   
    return view('frontend.blogs', ['blogs' => $blogs]);
})->name('blogs');

Route::get('/blog/detail/{id}', function ($id) {
    $blog = Blog::findOrFail($id);
    $previous = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first(); // Older blog
    $next = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();    // Newer blog

    return view('frontend.blog-detail', compact('blog', 'previous', 'next'));
})->name('blog.detail');


Route::get('/gallery', function () {
    $gallery = Gallery::first();
    return view('frontend.gallery', ['gallery' => $gallery]);
})->name('gallery');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');


Route::post('/submit-inquiry', [InquirySubmissionController::class, 'storeGetInTouchInquiry'])
  ->name('inquiry.submit');

Route::post('/service-inquiry', [InquirySubmissionController::class, 'storeServiceInquiry'])
  ->name('service.inquiry.submit');

Route::post('/car-inquiry', [InquirySubmissionController::class, 'storeCarInquiry'])
  ->name('car.inquiry.submit');

Route::post('/contact-us/submit-enquiry', [InquirySubmissionController::class, 'storeContactInquiry'])
->name('enquiry.submit');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
