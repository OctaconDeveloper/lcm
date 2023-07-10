<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'unit_name' => 'required|string|unique:units,name',
            'unit_division' => 'required|string',
            'unit_location' => 'required|string|unique:users,email'
        ]); 
        $code = password_generator(4);
        $data = [
            'name' => $request->unit_name,
            'div' => $request->unit_division,
            'location' => $request->unit_location,
            'code' => "LCM-".$code
        ];

        Unit::create($data);
        activityLogger(auth()->user(), "Created new {$request->unit_name} unit for {$request->unit_division} division");
        return redirect()->back()->with('msg', "New unit created successfully");
    }

    public function delete(Request $request, string $id)
    {
        $unitId = decrypt_data($id);
        $unit = Unit::find($unitId);
        if(!$unit) {
            return redirect()->back()->withErrors(["No unit record found"]);
        }
        $unit->delete();
        activityLogger(auth()->user(), "Deleted record for {$unit->name} unit");
        return redirect()->back()->with('msg', "Unit deleted successfully.");
    }
    
}
