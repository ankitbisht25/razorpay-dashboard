<?php

namespace App\Models\Youtube;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';
    protected $fillable = ['channel_name', 'subscribers', 'views', 'profile_logo'];
}
