<?php

use App\Http\Controllers\ProfileController;
require __DIR__.'/auth.php';
use App\Livewire\BlogDetail;
use App\Livewire\ShowBlog;
use App\Livewire\ShowFaqPage;
use App\Livewire\ShowHome;
use App\Livewire\ShowPage;
use App\Livewire\ShowService;
use App\Livewire\ShowServicePage;
use App\Livewire\ShowTeamPage;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DownloadController;

Route::get('/', ShowHome::class)->name('home');
Route::get('/games', ShowServicePage::class)->name('servicesPage');
Route::get('/game/{id}', ShowService::class)->name('servicePage');
Route::get('/team', ShowTeamPage::class)->name('teamPage');
Route::get('/news', ShowBlog::class)->name('blog');
Route::get('/news/{id}', BlogDetail::class)->name('blogDetail');
Route::get('/faqs', ShowFaqPage::class)->name('faqs');
Route::get('/page/{id}', ShowPage::class)->name('page');
Route::match(['get', 'post'], '/user-logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
})->name('user.logout');

Route::get('/download', [DownloadController::class, 'download'])->name('download.route');
