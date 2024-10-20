<?php

use App\Models\Section;
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
$host = env('APP_URL');
Route::get('/', function () use ($host) {
    return redirect()->away("{$host}:8000/knowledge-base-worx/login");
});

Route::get('/section_download/{id}', function ($id) {
    // return response()->download(storage_path('app/public/section_download.txt'));
    return 'Download section_id: '.Section::find($id)->title;
})->name('section.download');