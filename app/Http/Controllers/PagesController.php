<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deport;
use App\Models\Shippment;
use App\Models\Unit;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    { 
        $shipments = Shippment::orderBy('created_at', 'DESC')->take(15)->get();
        $categories = Category::orderBy('created_at', 'DESC')->take(10)->get();
        return view('pages.dashboard', compact('shipments','categories'));
    }
    public function settings()
    {
        return view('pages.settings');
    }
    public function logs()
    {
        return view('pages.logs');
    }
    public function viewAdmins()
    {
        return view('pages.view-admins');
    }

    public function viewAdmin(Request $request, string $user_id)
    {
        $userId = decrypt_data($user_id);
        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->withErrors(["No admin record found"]);
        }
        $completed = Shippment::where('sending_officer_id', $user->id)->orWhere('receiving_officer_id', $user->id)->count();
        $pending = Shippment::where(function ($query) use ($user) {
            $query->where('sending_officer_id', $user->id)->orWhere('receiving_officer_id', $user->id);
        })->where('status', 'pending')->orWhere('status', 'processing')->count();
        $rejected = Shippment::where(function ($query) use ($user) {
            $query->where('sending_officer_id', $user->id)->orWhere('receiving_officer_id', $user->id);
        })->where('status', 'rejected')->count();
        $units = Unit::all();
        return view('pages.view-admin', compact('user', 'completed', 'pending', 'rejected', 'units'));
    }

    public function viewUnits()
    {
        return view('pages.view-units');
    }

    public function viewCategories()
    {
        return view('pages.view-categories');
    }

    public function viewLogistics()
    {
        $shipments = Shippment::orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        $units = Unit::all();
        $deports = Deport::all();
        $vendors = Vendor::all();
        

        return view('pages.view-logistics',compact('shipments', 'categories','units','deports','vendors'));
    }

    public function viewLogistic(Request $request, string $user_id)
    {
        $shipmentId = decrypt_data($user_id);
        $shipment = Shippment::find($shipmentId);
        if (!$shipment) {
            return redirect()->back()->withErrors(["No record found"]);
        }
        return view('pages.view-logistic', compact('shipment'));
    }


    public function viewDeports()
    {
        return view('pages.view-deports');
    }    
    
    public function ViewDeport(Request $request, string $id)
    {
        $deportId = decrypt_data($id);
        $deport = Deport::find($deportId);
        if (!$deport) {
            return redirect()->back()->withErrors(["No deport record found"]);
        }
        
        return view('pages.view-deport', compact('deport'));
    }    
    
    public function viewVendors()
    {
        return view('pages.view-vendors');
    }    
    
    public function viewVendor(Request $request, string $id)
    {
        return view('pages.view-vendor');
    }
}
