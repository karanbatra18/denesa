<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitePermission extends Model
{
    protected $fillable = [
        'user_id',
        'site_module_id',
        'can_write',
        'can_edit',
        'can_delete',
    ];
}
