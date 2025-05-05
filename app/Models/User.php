<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Roles del usuario
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Solicitudes asignadas al árbitro
     */
    public function assignedSubmissions()
    {
        return $this->belongsToMany(SubmissionRequest::class, 'submission_arbitrator', 'user_id', 'submission_request_id')
            ->withPivot('status', 'comments', 'review_document_path', 'created_at', 'updated_at')
            ->withTimestamps();
    }

    /**
     * Revisiones realizadas por este árbitro
     */
    public function reviews()
    {
        return $this->hasMany(SubmissionReview::class);
    }

    /**
     * Verifica si el usuario tiene un rol específico
     */
    public function hasRole(string $role): bool
    {
        return $this->roles()->where('slug', $role)->exists();
    }

    public function assignRole(string $role): void
    {
        $role = Role::where('slug', $role)->firstOrFail();
        if (!$this->hasRole($role->slug)) {
            $this->roles()->attach($role);
        }
    }

    public function removeRole(string $role): void
    {
        $role = Role::where('slug', $role)->firstOrFail();
        $this->roles()->detach($role);
    }
}
