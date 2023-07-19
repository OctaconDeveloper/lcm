<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deport;
use App\Models\Inventory;
use App\Models\Shippment;
use App\Models\Unit;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|exists:categories,id',
            'shippment_name' => 'nullable',
            'deport' => 'required|string|exists:deports,id',
            'quantity' => 'required|numeric|min:1',
            'send_date' => 'required|date',
            'delivery_date' => 'required|date',
            'description' => 'required|string',
            'vendor' => 'required|string|exists:vendors,id'
        ]); 


        $destination = Deport::find($request->deport);
        $vendor = Vendor::find($request->vendor);
        $catergory = Category::find($request->category);

        $code = "LCM-SH-".$destination->unit->code.password_generator(5);
        
        $isDateScheduled = Carbon::parse($request->send_date)->diffInDays() > 0 ? true : false;
        
        $data = [
            'code' => $code,
            'name' => $catergory->name.' Movement',
            'description' => $request->description,
            'is_scheduled' => $isDateScheduled,
            'category_id' => $request->category,
            'start_unit' => $vendor->id,
            'end_unit' => $destination->id,
            'quantity' => $request->quantity,
            'routes' => json_encode([]),
            'sending_officer_id' => auth()->user()->id,
            'proposed_delivery_date' => Carbon::parse($request->delivery_date)->format('M, d Y H:i'),
            'send_date' => Carbon::parse($request->send_date)->format('M, d Y H:i'),
            'status' => $isDateScheduled ? 'pending' : 'processing'
        ];
        
        Shippment::create($data);
        activityLogger(auth()->user(), "Created new movement {$catergory->name} to {$destination->name} in  {$destination->unit->name}");
        return redirect()->back()->with('msg', "New movement created successfully");
    }

    public function approve(Request $request, string $id)
    {
        $shipmentId = decrypt_data($id);
        $shipment = Shippment::find($shipmentId);
        if(!$shipment) {
            return redirect()->back()->withErrors(["No record found"]);
        }
        $category = $shipment->category;
        $deport = $shipment->endunit;
        $quantity = $shipment->quantity;

        $deportInventory = Inventory::whereCategoryId($category->id)->whereDeportId($deport->id)->first();
        if($deportInventory){
            $newQuantity = (int) $deportInventory->quantity + $quantity;
            $deportInventory->update(['quantity' => $newQuantity]);
        }else{
            Inventory::create([
                'category_id' => $category->id,
                'deport_id' => $deport->id,
                'quantity' => $quantity
            ]);
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
