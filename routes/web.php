<?php

use App\Models\Documentation;
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
    return redirect()->away("{$host}/knowledge-base-worx/login");
})->name('main');

Route::middleware(['auth'])->group(function () {
    Route::get('/Documentation/{id}', function ($id) {
        $doc = Documentation::findOrFail($id);
        if ($doc && $doc->pdf) {
            return response()->download(storage_path('app/public/' . $doc->pdf), $doc->title);
        } else {
            return abort(404);
        }
    })->name('downloadDoc');
});
Route::get('/section_download/{id}', function ($id) {
    // return response()->download(storage_path('app/public/section_download.txt'));
    return 'Download section_id: '.Section::find($id)->title;
})->name('section.download');