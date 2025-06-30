<?php

use App\Http\Controllers\admin\InventoryController;
use App\Http\Controllers\Admin\ManageBlog;
use App\Http\Controllers\Admin\ManageCarInquiry;
use App\Http\Controllers\Admin\ManageContact;
use App\Http\Controllers\Admin\ManageGallery;
use App\Http\Controllers\Admin\ManageGetInTouch;
use App\Http\Controllers\Admin\ManageService;
use App\Http\Controllers\Admin\ManageServiceInquiry;
use App\Http\Controllers\Admin\UserProfileController;
use App\Models\CarInquiry;
use App\Models\Contact;
use App\Models\GetInTouch;
use App\Models\ServiceInquiry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;



Route::middleware(['auth'])->group(function () {

    Route::group(['as' => 'admin.'], function () {

        Route::get('/dashboard', function () {
            $range = Request::get('daterange');
        
            if ($range && str_contains($range, ' to ')) {
                [$from, $to] = explode(' to ', $range);
                $fromDate = Carbon::parse($from)->startOfDay();
                $toDate = Carbon::parse($to)->endOfDay();
            } else {
                $fromDate = now()->subDays(7)->startOfDay();
                $toDate = now()->endOfDay();
            }      
            return view('admin.home', [
                'contactUsCount' => Contact::whereBetween('created_at', [$fromDate, $toDate])->count(),
                'carInquiriesCount' => CarInquiry::whereBetween('created_at', [$fromDate, $toDate])->count(),
                'serviceInquiriesCount' => ServiceInquiry::whereBetween('created_at', [$fromDate, $toDate])->count(),
                'getInTouchCount' => GetInTouch::whereBetween('created_at', [$fromDate, $toDate])->count(),
            ]);
        })->name('dashboard');

        Route::get('/change-password', [UserProfileController::class, 'change_password'])->name('profile');

        Route::post('/update-password', [UserProfileController::class, 'update_password'])->name('update.password');

        Route::resource('manage-inventory', InventoryController::class);

        Route::post('/manage-inventory/upload-image', [InventoryController::class, 'uploadImage'])->name('manage-inventory.upload-image');
        
        Route::post('/manage-inventory/delete-image', [InventoryController::class, 'deleteImage'])->name('manage-inventory.delete-image');

        Route::resource('manage-service', ManageService::class);

        Route::resource('manage-blog', ManageBlog::class);

        Route::resource('manage-gallery', ManageGallery::class);

        Route::post('/manage-gallery/upload-image', [ManageGallery::class, 'uploadImage'])->name('manage-gallery.upload-image');
        
        Route::post('/manage-gallery/delete-image', [ManageGallery::class, 'deleteImage'])->name('manage-gallery.delete-image');

        Route::resource('manage-contact', ManageContact::class);

        Route::resource('manage-getintouch', ManageGetInTouch::class);

        Route::resource('manage-carinquiry', ManageCarInquiry::class);

        Route::resource('manage-serviceinquiry', ManageServiceInquiry::class);
        
    });
});
