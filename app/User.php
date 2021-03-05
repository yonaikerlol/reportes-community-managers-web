<?php declare(strict_types=1);

namespace App;

use App\Report;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "email_verified_at",
        "password",
        "admin",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ["password", "admin"];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "email_verified_at" => "datetime",
        "admin" => "bool",
    ];

    /**
     * Get the user's full name.
     *
     * @param string $value
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }

    /**
     * Get the count of reports of the user.
     *
     * @return int
     */
    public function getReportsCountAttribute(): int
    {
        return Report::where("user_id", $this->id)->count();
    }

    /**
     * Model's boot function.
     *
     * @return void
     */
    public static function boot(): void
    {
        parent::boot();

        static::saving(function (self $user) {
            // Hash user password, if not already hashed
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
            }
        });
    }

    /**
     * Has many Reports.
     */
    public function reports()
    {
        return $this->hasMany("App\\Report");
    }

    /**
     * Verify if the User is admin or not.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
