<?php

namespace App\Http\Controllers\Admin;

use App\CallSale;
use App\ContactSupport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactUsController extends Controller
{
    public function edit()
    {
        $callSales = CallSale::get();
        $contactSupport = ContactSupport::first();
        return view('admin.contact-us.edit', compact('callSales', 'contactSupport'));
    }

    public function update(Request $request)
    {
        if (!empty($request->callSale)) {
            foreach ($request->callSale as $key => $value) {
                $callSales= CallSale::findOrFail($key);
                $callSales->place = $value['place'] ?? null;
                $callSales->address = $value['address'] ?? null;
                $callSales->phone = $value['phone'] ?? null;
                $callSales->save();
            }
        }

        $data = $request->except(['_token', 'callSale']);
        $contactSupport = ContactSupport::first()->update($data);


        return Redirect::back()->withSuccess(['msg', 'Successfully Updated']);
    }
}
