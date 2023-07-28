<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Models\Client;
use App\Models\User;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RequestController;



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

    $clients = Client::all(); // Retrieve the list of clients
    $clientCount = $clients->count(); // Calculate the client count

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,

        'clients' => $clients, // Pass the list of clients
        'clientCount' => $clientCount,
    ]);
});


Route::get('/dashboard', function () {
    $users = User::all();
    $userCount = $users->count();


    $clients = Client::all(); // Retrieve the list of clients
    $clientCount = $clients->count(); // Calculate the client count

    return Inertia::render('Dashboard', [
        'clients' => $clients, // Pass the list of clients
        'clientCount' => $clientCount,

        'users' => $users,
        'userCount' => $userCount,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clients/edit/{client}',[ClientController::class,'edit'])->middleware(['role:editor,admin']);
    Route::get('/clients/create',[ClientController::class,'create'])->middleware(['role:admin']);
    Route::post('/clients', [ClientController::class, 'store']);
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::get('/clients/{client}', [ClientController::class, 'show'])->middleware('role:user,admin,editor');
    Route::patch('/clients/{client}',[ClientController::class,'update']);
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->middleware(['role:admin']);
    Route::get('/clients/search/{search}', [ClientController::class, 'index']);
    Route::post('/clients/toggle/{client}', [ClientController::class, 'toggle'])->middleware(['role:admin']);;

    Route::get('/clients/pdf/{client}',[ClientController::class,'pdf'])->middleware(['role:admin']);

    Route::get('/clients/email/{client}', [ClientController::class, 'email'])->middleware(['role:admin']);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware(['role:admin']);
    Route::post('/admin/send-mail', [AdminController::class, 'sendMailToAllClients']);


    Route::get('/requests', [RequestController::class, 'index'])->name('requests')->middleware(['role:admin']);




});

require __DIR__.'/auth.php';
