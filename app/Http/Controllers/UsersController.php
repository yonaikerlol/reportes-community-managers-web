<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function showDashboard()
    {
        return view("admin.dashboard");
    }

    /**
     * Show the form of the user profile to edit.
     */
    public function showProfileEditForm()
    {
        return view("admin.profile.edit");
    }

    /**
     * Update the user with the form to edit.
     *
     * @param \Illuminate\Http\Request $request The form data.
     */
    public function update(Request $request)
    {
        // Validate the input.
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
        ]);

        // Retrieve the input.
        $input = $request->all();

        // Find the user to update.
        $user = User::findOrFail(Auth::user()->id);

        // Update the user.
        $user->update($input);

        // Flash successfull message.
        Session::flash("status", "Perfil actualizado satisfactoriamente");

        // Redirect to the reports dashboard.
        return redirect(route("admin.profile.edit"));
    }

    /**
     * Show the form to change the password.
     */
    public function showChangePasswordForm()
    {
        return view("admin.profile.change-password");
    }

    /**
     * Change the password.
     *
     * @param \Illuminate\Http\Request $request Teh form data.
     */
    public function changePassword(Request $request)
    {
        // Validate the input.
        $request->validate([
            "old_password" => "required",
            "password" => "required|confirmed|different:old_password",
        ]);

        // Retrieve the input.
        $input = $request->all();

        // Find the user to update.
        $user = User::findOrFail(Auth::user()->id);

        // Check the hash of the current password and the "current password" submited by the user.
        if (Hash::check($input["old_password"], $user->password)) {
            $user
                ->fill([
                    "password" => Hash::make($input["password"]),
                ])
                ->save();

            // Flash successfull message.
            Session::flash(
                "status",
                "Contraseña actualizada satisfactoriamente"
            );

            // Redirect to the reports dashboard.
            return redirect(route("admin.profile.edit"));
        } else {
            // Flash a error message.
            Session::flash("status", "La contraseña actual no coincide");

            return redirect()
                ->back()
                ->withInput();
        }
    }

    /**
     * Show the users list (only Admin's).
     */
    public function showUsersList()
    {
        $users = User::all()->except(Auth::user()->id);
        $usersCount = $users->count();

        return view("admin.user.index")
            ->withUsers($users)
            ->withUsersCount($usersCount);
    }

    /**
     * Show create form to store a user.
     */
    public function showCreateForm()
    {
        return view("admin.user.create");
    }

    /**
     * Store a new user.
     *
     * @param \Illuminate\Http\Request $request The form data.
     */
    public function store(Request $request)
    {
        // Validate the input.
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed",
        ]);

        // Retrieve the input.
        $input = $request->all();

        // Set the admin boolean to the input.
        $input["admin"] = $request->input("admin") === "on";

        // Create the user.
        User::create($input);

        // Redirect to the users list.
        return redirect(route("admin.users.index"));
    }

    /**
     * Show delete form to remove a user.
     *
     * @param int $id The id of the user.
     */
    public function showDeleteForm($id)
    {
        // Get the user or fail.
        $user = User::findOrFail($id);

        // Return the view to delete the user.
        return view("admin.user.delete")->withUser($user);
    }

    /**
     * Remove a user.
     *
     * @param int $id The id of the user.
     */
    public function destroy($id)
    {
        // Get the user or fail.
        $user = User::findOrFail($id);

        // Delete the user.
        $user->delete();

        // Flash a successfull message to the client.
        Session::flash("status", "Usuario eliminado satisfactoriamente");

        // Redirect to the users list.
        return redirect(route("admin.users.index"));
    }

    /**
     * Show the edit form to edit a user.
     *
     * @param int $id The id of the user.
     */
    public function showEditForm($id)
    {
        // Get the user or fail.
        $user = User::findOrFail($id);

        // Return the form to edit the user.
        return view("admin.user.edit")->withUser($user);
    }

    /**
     * Update a user (Only admin users).
     *
     * @param \Illuminate\Http\Request $request The form data.
     * @param int $id The id of the user to edit.
     */
    public function updateAUser(Request $request, $id)
    {
        // Validate the input.
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
        ]);

        // Retrieve the input.
        $input = $request->all();

        // Set the admin boolean to the input.
        $input["admin"] = $request->input("admin") === "on";

        // Get the user to edit or fail.
        $user = User::findOrFail($id);

        // Update the user.
        $user->update($input);

        // Flash successfull message.
        Session::flash("status", "Usuario actualizado satisfactoriamente");

        // Redirect to the users list.
        return redirect(route("admin.users.index"));
    }

    /**
     * Change the password of a user (Only admin users).
     *
     * @param int $id The id of the user to change the password.
     */
    public function showChangePasswordFormAsAdmin($id)
    {
        // Get the user or fail.
        $user = User::findOrFail($id);

        // Return the view to change the password with the users details.
        return view("admin.user.change-password")->withUser($user);
    }

    /**
     * Update the password of a user (Only admin users).
     *
     * @param \Illuminate\Http\Request $request The form data.
     * @param int $id The id of the user to update the password.
     */
    public function changePasswordAsAdmin(Request $request, $id)
    {
        // Validate the input.
        $request->validate([
            "password" => "required|confirmed",
        ]);

        // Retrieve the input.
        $input = $request->all();

        // Find the user to update.
        $user = User::findOrFail($id);

        // Update the password of the user.
        $user
            ->fill([
                "password" => Hash::make($input["password"]),
            ])
            ->save();

        // Flash a successfull message.
        Session::flash("status", "Contraseña actualizada satisfactoriamente");

        return redirect(route("admin.users.index"));
    }
}
