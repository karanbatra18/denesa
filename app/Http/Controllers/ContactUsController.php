<?php

namespace App\Http\Controllers;

use App\CallSale;
use App\ContactSupport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactUsController extends Controller
{
    public function show()
    {
        $callSales = CallSale::get();
        $contactSupport = ContactSupport::first();
        return view('contact-us.show',  compact('callSales', 'contactSupport'));
    }
}
