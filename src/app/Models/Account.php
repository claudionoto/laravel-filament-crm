<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'surname',
        'username',
        'password',
        'email',
        'level',
        'agent_code',
        'area_manager_id',
        'structure_id',
        'commercial_profile',
        'area',
        'team_leader',
        'assigned_operators',
        'assigned_agents',
        'extractor',
        'enabled',
        'remember_token',
        'last_login_date',
        'last_logout_date',
        'login_ip_address',
    ];
}
