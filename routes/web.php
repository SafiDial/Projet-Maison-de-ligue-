<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CollaborateurController;
use App\Http\Controllers\HomeController;

// ------------------------------------
//  Page d'accueil publique
// ------------------------------------
Route::get('/', function () {
    return view('welcome');
});

// ------------------------------------
//  Authentification
// ------------------------------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ------------------------------------
// 👤 Création de collaborateur (accessible à tout le monde)
// ------------------------------------
Route::get('/collaborateurs/create', [CollaborateurController::class, 'create'])->name('collaborateurs.create');
Route::post('/collaborateurs', [CollaborateurController::class, 'store'])->name('collaborateurs.store');

// ------------------------------------
//  Page d'accueil après login
// ------------------------------------
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// ------------------------------------
//  Routes pour utilisateurs connectés (non-admins)
// ------------------------------------
Route::middleware(['auth'])->group(function () {
    // Affichage limité pour utilisateurs non-admin
    Route::get('/collaborateurs/user', [CollaborateurController::class, 'indexForUsers'])->name('collaborateurs.index_user');

    // Permet à l'utilisateur de s'éditer lui-même, mais sans modifier son rôle d'admin
    Route::get('/collaborateurs/{id}/edit', [CollaborateurController::class, 'edit'])->name('collaborateurs.edit');
    Route::put('/collaborateurs/{id}', [CollaborateurController::class, 'update'])->name('collaborateurs.update');
});

// ------------------------------------
//  Routes Admin (requiert middleware 'admin')
// ------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    // Tableau de bord Admin

    // Gestion des collaborateurs par l'admin
    Route::get('/admin/add-collaborateur', [AdminController::class, 'addCollaborateur'])->name('admin.addCollaborateur');
    Route::post('/admin/store-collaborateur', [AdminController::class, 'storeCollaborateur'])->name('admin.storeCollaborateur');
    Route::get('/admin/delete-collaborateur/{id}', [AdminController::class, 'deleteCollaborateur'])->name('admin.deleteCollaborateur');

    // Gestion complète des collaborateurs (Admin peut gérer tous les collaborateurs)
    Route::get('/collaborateurs', [CollaborateurController::class, 'index'])->name('collaborateurs.index');
    Route::delete('/collaborateurs/{id}', [CollaborateurController::class, 'destroy'])->name('collaborateurs.destroy');
});
