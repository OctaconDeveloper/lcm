<?php

namespace App\Http\Controllers;

use App\Models\Shippment;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|exists:categories,id',
            'shippment_name' => 'required|string',
            'destination_unit' => 'required|string|exists:units,id',
            'quantity' => 'required|numeric|min:1',
            'send_date' => 'required|date',
            'delivery_date' => 'required|date',
            'description' => 'required|string'
        ]); 

        $destinantion = Unit::find($request->destination_unit);

        $code = "LCM-SH-".auth()->user()->unit->code.password_generator(5);
        
        $isDateScheduled = Carbon::parse($request->send_date)->diffInDays() > 0 ? true : false;
        
        $data = [
            'code' => $code,
            'name' => $request->shippment_name,
            'description' => $request->description,
            'is_scheduled' => $isDateScheduled,
            'category_id' => $request->category,
            'start_unit' => auth()->user()->unit->id,
            'end_unit' => $request->destination_unit,
            'quantity' => $request->quantity,
            'routes' => json_encode([]),
            'sending_officer_id' => auth()->user()->id,
            'proposed_delivery_date' => Carbon::parse($request->delivery_date)->format('M, d Y H:i'),
            'send_date' => Carbon::parse($request->send_date)->format('M, d Y H:i'),
            'status' => $isDateScheduled ? 'pending' : 'processing'
        ];
        
        Shippment::create($data);
        activityLogger(auth()->user(), "Created new shipment {$request->shippment_name} to {$destinantion->name} in  {$destinantion->div}");
        return redirect()->back()->with('msg', "New shippment created successfully");
    }

    public function approve(Request $request, string $id)
    {
        $shipmentId = decrypt_data($id);
        $shipment = Shippment::find($shipmentId);
        if(!$shipment) {
            return redirect()->back()->withErrors(["No record found"]);
        }
        $shipment->update([
            'receiving_officer_id' => auth()->user()->id,
            'status' => 'delivered',
            'delivered_date' =>Carbon::now()->format('M, d Y H:i')
        ]);
        activityLogger(auth()->user(), "Accepted delivery of shipment  with code {$shipment->code}");
        return redirect()->back()->with('msg', "Approval successful.");
    }

    public function reject(Request $request, string $id)
    {
        $shipmentId = decrypt_data($id);
        $shipment = Shippment::find($shipmentId);
        if(!$shipment) {
            return redirect()->back()->withErrors(["No record found"]);
        }
        $shipment->update([
            'receiving_officer_id' => auth()->user()->id,
            'status' => 'rejected',
            'delivered_date' =>Carbon::now()->format('M, d Y H:i')
        ]);
        activityLogger(auth()->user(), "Rejected delivery of shipment  with code {$shipment->code}");
        return redirect()->back()->with('msg', "Rejection successful.");
    }
   
    
}
