<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApproveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\FrontController;



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
Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');



Route::resource('donatur', DonaturController::class);
Route::get('donatur/{$slug}', [DonaturController::class, 'show']);
Route::post('donatur', [DonaturController::class, 'store'])->name('donatur.store');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
    Route::resource('admin', AdminController::class);
    Route::post('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //KATEGORI
Route::resource('kategori', KategoriController::class);
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategoristore', [KategoriController::class, 'store'])->name('kategori.store');
Route::post('/kategori/{$id}/edit', [KategoriController::class,'edit'])->name('kategori.edit');
Route::put('/kategori/{$id}', [KategoriController::class, 'update'])->name('kategori.update');


//artikel
Route::resource('artikels', ArtikelController::class);
Route::get('/artikels', [ArtikelController::class, 'index'])->name('artikel.index');
Route::post('/artikelsstore', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikels/create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::get('/artikels/{$id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikels/{$id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikels/{$id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');


// Route::get('/artikels/{$slug}', [ArtikelController::class, 'detail'])->name('detail.artikel');

//playlist
Route::resource('playlist', PlaylistController::class);
Route::get('/playlist', [PlaylistController::class, 'index'])->name('playlist.index');
Route::get('/playlist/create', [PlaylistController::class, 'create'])->name('playlist.create');
Route::post('/playliststore', [PlaylistController::class, 'store'])->name('playlist.store');
Route::post('/playlist/{$id}/edit', [PlaylistController::class, 'edit'])->name('playlist.edit');
Route::put('/playlist/{$id}', [PlaylistController::class, 'update'])->name('playlist.update');
Route::delete('/playlist/{$id}', [PlaylistController::class, 'destroy'])->name('playlist.destroy');

//materi
Route::resource('materi', MateriController::class);
Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
Route::post('/materistore', [MateriController::class, 'store'])->name('materi.store');
Route::post('/materi/{$id}/edit', [MateriController::class, 'edit'])->name('materi.edit');
Route::put('/materi/{$id}', [MateriController::class, 'update'])->name('materi.update');
Route::delete('/materi/{$id}', [MateriController::class, 'delete'])->name('materi.delete');

//slide
Route::resource('slide', SlideController::class);
Route::get('/slide', [SlideController::class, 'index'])->name('slide.index');
Route::get('/slide/create', [SlideController::class, 'create'])->name('slide.create');
Route::post('/slidestore', [SlideController::class, 'store'])->name('slide.store');
Route::post('/slide/{$id}/edit', [SlideController::class, 'edit'])->name('slide.edit');
Route::put('/slide/{$id}', [SlideController::class, 'update'])->name('slide.update');
Route::delete('/slide/{$id}', [SlideController::class, 'delete'])->name('slide.delete');

//iklan
Route::resource('iklan', IklanController::class);
Route::get('/iklan', [IklanController::class, 'index'])->name('iklan.index');
Route::get('/iklan/create', [IklanController::class, 'create'])->name('iklan.create');
Route::post('/iklanstore', [IklanController::class, 'store'])->name('iklan.store');
Route::post('/iklan/{$id}/edit', [IklanController::class, 'edit'])->name('iklan.edit');
Route::put('/iklan/{$id}', [IklanController::class, 'update'])->name('iklan.update');
Route::delete('/iklan/{$id}', [IklanController::class, 'delete'])->name('iklan.delete');

//approve donasi
Route::put('/data/{id}', [ApproveController::class, 'show'])->name('data.approve');
Route::get('/data/update/{id}', [ApproveController::class, 'update'])->name('data.notapprove');

// Route::get('/data/{id}/update', [ApproveController::class, 'update'])->name('data.notapprove');

//campaign
Route::resource('campaign', CampaignController::class);
Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
Route::post('/campaignstore', [CampaignController::class, 'store'])->name('campaign.store');
Route::get('/campaign/{$id}/edit', [CampaignController::class, 'edit'])->name('campaign.edit');
Route::put('/campaign/{$id}', [CampaignController::class, 'update'])->name('campaign.update');
// Route::put('/campaign/{$id}', [CampaignController::class, 'update'])->name('campaign.update');
Route::delete('/campaign{$id}', [CampaignController::class, 'destroy'])->name('campaign.delete');
Route::get('/campaign/{$event:slug)', [CampaignController::class, 'event'])->name('campaign.event');

//donasi
Route::resource('donasi', DonasiController::class);
Route::get('/donasi/create', [DonasiController::class, 'create'])->name('donasi.create');
Route::post('/donasistore', [DonasiController::class, 'store'])->name('donasi.store');
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi.index');
Route::delete('/donasi/{$id}', [DonasiController::class, 'destroy'])->name('donasi.delete');
Route::get('/donasi/{$id}/edit', [DonasiController::class, 'edit'])->name('donasi.edit');
Route::patch('/donasi/{$id}', [DonasiController::class, 'update'])->name('donasi.update');





    });

    //user
    Route::group(['middleware' => ['cek_login:editor']], function () {
        Route::resource('editor', AdminController::class);
    });
});

// Auth::routes();

Route::get('detail-kategori/{$detail_kategori}', [DetailController::class, 'show'] )->name('blog.show');
Route::resource('/detail-kategori', DetailController::class);

// Route::get('/', [FrontController::class, 'index'] )->name('beranda');
Route::get('/', [FrontController::class, 'event'] )->name('donasi');
Route::get('/detail-artikel/{$slug}', [FrontController::class, 'show'] )->name('detail.artikel');

Route::resource('/detail-artikel', FrontController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//donasi

// Route::patch('/donasi/{$id}', [DonasiController::class, 'approve'])->name('donasi.approve');
// Route::patch('/donasi/{$id}', [DonasiController::class, 'notapprove'])->name('donasi.notapprove');
Route::get('/changestatus', [DonasiController::class, 'changestatus'])->name('donasi.change');



Route::resource('data', ApproveController::class);


// Route::post('/data/{id}/not-approve', [ApproveController::class, 'notApprove'])->name('data.not-approve');




// Route::get('/donatur/{$donatur}', [DonaturController::class, 'index']);
    // Route::resource('data', ApproveController::class);

    // Route::put('statusm/{$id}', [ApproveController::class, 'approve'])->name('status.approve');
    // Route::put('status/{$id}', [ApproveController::class, 'notapprove'])->name('status.notapprove');







