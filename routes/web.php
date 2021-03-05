<?php

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

Route::pattern("id", "[0-9]+");
Route::get("/", "HomeController@index")->name("home");

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get("login", "Auth\LoginController@showLoginForm")->name("login");
Route::post("login", "Auth\LoginController@login");
Route::post("logout", "Auth\LoginController@logout")->name("logout");

// Password Reset Routes
Route::get("password/reset", "Auth\ForgotPasswordController@showLinkRequestForm")
    ->name("password.request");
Route::post("password/email", "Auth\ForgotPasswordController@sendResetLinkEmail")
    ->name("password.email");
Route::get("password/reset/{token}", "Auth\ResetPasswordController@showResetForm")
    ->name("password.reset");
Route::post("password/reset", "Auth\ResetPasswordController@reset")
    ->name("password.update");

/*
|--------------------------------------------------------------------------
| Automatic Reports Routes
|--------------------------------------------------------------------------
*/
Route::prefix("reportes/automaticos")->group(function () {
    Route::get("/{date}", "AutomaticReportsController@show")
        ->name("automaticReport.show")
        ->where([
            "date" => "[0-9]{2}-[0-9]{2}-[0-9]{4}",
        ]);
});

/*
|--------------------------------------------------------------------------
| Manual Reports Routes
|--------------------------------------------------------------------------
*/
Route::prefix("reportes/manuales")->group(function () {
    Route::get("/{id}", "ManualReportsController@show")
        ->name("manualReport.show");
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix("admin")->group(function () {
    Route::middleware("auth")->group(function () {
        Route::get("/dashboard", "UsersController@showDashboard")
            ->name("admin.dashboard");

        // Profile Routes
        Route::prefix("/perfil")->group(function () {
            Route::get("/editar", "UsersController@showProfileEditForm")
                ->name("admin.profile.edit");

            Route::post("/editar", "UsersController@update")
                ->name("admin.profile.update");

            Route::get("/change-password", "UsersController@showChangePasswordForm")
                ->name("admin.profile.change-password");

            Route::post("/change-password", "UsersController@changePassword")
                ->name("admin.profile.update-password");
        });

        // Reports Routes
        Route::prefix("/reportes")->group(function () {
            Route::get("/", "ManualReportsController@showDashboard")
                ->name("admin.reports.index");

            Route::get("/crear", "ManualReportsController@showCreateForm")
                ->name("admin.reports.create");

            Route::post("/crear", "ManualReportsController@store")
                ->name("admin.reports.store");

            Route::get("/{id}/eliminar", "ManualReportsController@showDeleteForm")
                ->name("admin.reports.delete");

            Route::post("/{id}/eliminar", "ManualReportsController@destroy")
                ->name("admin.reports.destroy");

            Route::get("/{id}/editar", "ManualReportsController@showEditForm")
                ->name("admin.reports.edit");

            Route::post("/{id}/editar", "ManualReportsController@update")
                ->name("admin.reports.update");
        });

        // If the user is admin can create new users.
        Route::middleware("userIsAdmin")->group(function () {
            Route::prefix("usuarios")->group(function () {
                Route::get("/", "UsersController@showUsersList")
                    ->name("admin.users.index");

                Route::get("/crear", "UsersController@showCreateForm")
                    ->name("admin.users.create");

                Route::post("/crear", "UsersController@store")
                    ->name("admin.users.store");

                Route::get("/{id}/editar", "UsersController@showEditForm")
                    ->name("admin.users.edit");

                Route::post("/{id}/editar", "UsersController@updateAUser")
                    ->name("admin.users.update");

                Route::get("/{id}/change-password", "UsersController@showChangePasswordFormAsAdmin")
                    ->name("admin.users.change-password");

                Route::post("/{id}/change-password", "UsersController@changePasswordAsAdmin")
                    ->name("admin.users.update-password");

                Route::get("/{id}/eliminar", "UsersController@showDeleteForm")
                    ->name("admin.users.delete");

                Route::post("/{id}/eliminar", "UsersController@destroy")
                    ->name("admin.users.destroy");
            });
        });
    });
});
