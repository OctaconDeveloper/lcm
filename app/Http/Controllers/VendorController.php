<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'vendor_name' => 'required|string|unique:vendors,name',
            'vendor_email' => 'required|string',
            'vendor_phone' => 'required|string',
            'vendor_address' => 'required|string'
        ]);

        $code = "NAV-".password_generator(4);
        $data = [
            "code" => $code,
            "name" => $request->vendor_name,
            "contact_email" => $request->vendor_email,
            "contact_phone" => $request->vendor_phone,
            "address" => $request->vendor_address,
            "status" => "active"
        ];

        Vendor::create($data);
        activityLogger(auth()->user(), "Created new {$request->vendor_name} vendor");
        return redirect()->back()->with('msg', "New vendor created successfully");
    }

    public function delete(Request $request, string $id)
    {
        $vendorId = decrypt_data($id);
        $vendor = Vendor::find($vendorId);
        if(!$vendor) {
            return redirect()->back()->withErrors(["No vendor record found"]);
        }
        $vendor->delete();
        activityLogger(auth()->user(), "Deleted record for vendor {$vendor->name}");
        return redirect()->back()->with('msg', "vendor deleted successfully.");
    }
}
