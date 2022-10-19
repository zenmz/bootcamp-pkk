<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('sekolah', function () {
    return 'Halaman untuk sekolah';
});



Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::get('deletesiswa/{id}', [SiswaController::class, 'destroy'])->name('deletesiswa');
});

// Route::get('dashboard', [SiswaController::class, 'index']);

// Route::get('template', function () {
//     return view('template');
// });

Route::get('dashboard', function () {
    return view('dashboard');
});

// Route::get('table', function () {
//     $data = [
//         [
//             'nama' => 'aaaa',
//             'alamat' => 'aaaa'
//         ],
//         [
//             'nama' => 'bbbb',
//             'alamat' => 'bbbb'
//         ],
//         [
//             'nama' => 'cccc',
//             'alamat' => 'cccc'
//         ],
//     ];

//     // dd($data);

//     return view('table', compact('data'));
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
