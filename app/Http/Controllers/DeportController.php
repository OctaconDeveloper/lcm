<?php

namespace App\Http\Controllers;

use App\Models\Deport;
use Illuminate\Http\Request;

class DeportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'deport_name' => 'required|string|unique:deports,name',
            'deport_unit' => 'required|numeric|exists:units,id',
            'deport_officer' => 'required|numeric|exists:users,id'
        ]);
        $code = "DPT-".password_generator(4);
        $data = [
            "code" => $code,
            "name" => $request->deport_name,
            "unit_id" => $request->deport_unit,
            "officer_id" => $request->deport_officer
        ];
        Deport::create($data);
        activityLogger(auth()->user(), "Created new {$request->deport_name} deport");
        return redirect()->back()->with('msg', "New deport created successfully");
    }

    public function delete(Request $request, string $id)
    {
        $deportId = decrypt_data($id);
        $deport = Deport::find($deportId);
        if(!$deport) {
            return redirect()->back()->withErrors(["No deport record found"]);
        }
        $deport->delete();
        activityLogger(auth()->user(), "Deleted record for deport {$deport->name}");
        return redirect()->back()->with('msg', "Deport deleted successfully.");
    }

}
