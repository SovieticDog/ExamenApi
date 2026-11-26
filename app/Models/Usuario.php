<?php

namespace App\Models;

use Database\Factories\UsuarioFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\Usuario as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes;
    use HasFactory, Notifiable;

    protected $fillable = [

         'role_id',
         'name',
         'email',
         'password',
        
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];


    protected function casts(): array
    {
        return [

        'email_verified_at' => 'datetime',
        'password' => 'hashed',

        ];
    }


     public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function getRoleName(): ?string
    {
        return $this->role?->name;
    }

    

     public function getPermissions(): array
    {
        return $this->role?->permissions() ?? [];
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->getPermissions(), true);
    }

    public function hasRole(string $role): bool
    {
        return $this->getRoleName() === $role;
    }

    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

  
    public function getJWTCustomClaims(): array
    {
        return [
            'role' => $this->getRoleName(),
        ];
    }

         


   
}
