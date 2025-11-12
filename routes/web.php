<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CKFinder routes
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

// CKEditor 5 demo route
Route::get('/ckeditor5', function () {
    return view('ckeditor5');
});

Route::view('/admin/blank.asp', 'admin.blank');

// Route test upload đơn giản
Route::post('/test-upload', function(Request $request) {
    try {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            
            // Kiểm tra kích thước file
            if ($file->getSize() > 1048576) { // 1MB = 1048576 bytes
                return response()->json(['uploaded' => false, 'error' => 'File size must be less than 1MB']);
            }

            // Kiểm tra phần mở rộng file
            $allowedExtensions = ['gif', 'jpeg', 'jpg', 'png'];
            $extension = strtolower($file->getClientOriginalExtension());
            if (!in_array($extension, $allowedExtensions)) {
                return response()->json(['uploaded' => false, 'error' => 'Only image files (gif, jpeg, jpg, png) are allowed']);
            }

            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('mediaroot/mediaroot/images'), $filename);
            
            return response()->json([
                'uploaded' => true,
                'url' => '/mediaroot/mediaroot/images/' . $filename
            ]);
        }
        return response()->json(['uploaded' => false, 'error' => 'No file uploaded']);
    } catch (Exception $e) {
        return response()->json(['uploaded' => false, 'error' => $e->getMessage()]);
    }
});
