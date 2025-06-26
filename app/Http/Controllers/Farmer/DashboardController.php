<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $productsCount = $user->products()->count();
        $ordersCount = $user->orders()->count();
        $inputsCount = Input::count();
        $products = $user->products()->latest()->take(5)->get();

        return view('farmer.dashboard', compact('productsCount', 'ordersCount', 'inputsCount', 'products'));
    }

    public function profile() {
        $user = Auth::user();
        return view('farmer.profile.index', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = 'user/profile_pictures';
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
                . '-' . time()
                . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $filename, 'public');
            $data['photo'] = $path . '/' . $filename;
        }

        $user->update($data);

        return redirect()->route('farmer.profile.index')->with('success', 'Profile updated successfully.');
    }
}
