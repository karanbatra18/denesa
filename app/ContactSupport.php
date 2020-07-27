<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactSupport extends Model
{
    protected $fillable = [
        'support_text',
        'support_browse_text',
        'support_email_id',
        'support_link',
        'support_whatsapp',
        'support_email',
        'support_call',

        'general_text',
        'general_browse_text',
        'general_email_id',
        'general_link',
        'general_whatsapp',
        'general_email',
        'general_call'
    ];
}
