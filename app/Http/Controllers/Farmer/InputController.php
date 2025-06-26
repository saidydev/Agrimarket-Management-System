<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Input;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputController extends Controller
{
    public function index()
    {
        $inputs = Input::with('supplier')->orderBy('created_at', 'desc')->paginate(10);
        return view('farmer.inputs.index', compact('inputs'));
    }

    public function show(Input $input)
    {
        $input = Input::with('supplier')->findOrFail($input->input_id);

        return view('farmer.inputs.show', compact('input'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'input_id' => 'required|exists:inputs,input_id',
            'supplier_id' => 'required|exists:users,id',
            'quantity' => 'required|string',
            'price' => 'required|string',
        ]);

        $order = Order::create([
            'farmer_id' => auth()->id(),
            'supplier_id' => $request->supplier_id,
            'input_id' => $request->input_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Order placed successfully!');
    }

    public function getOrders()
    {
        $groupOrders = Order::select('supplier_id', 'input_id')
            ->where('farmer_id', Auth::id())
            ->with(['supplier', 'input'])
            ->groupBy('supplier_id', 'input_id')
            ->paginate(10);

        return view('farmer.inputs.orders', compact('groupOrders'));
    }

    public function getOrdersHistory($supplierId, $inputId)
    {
        $orders = Order::with(['supplier', 'input'])
            ->where('farmer_id', Auth::id())
            ->where('supplier_id', $supplierId)
            ->where('input_id', $inputId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $supplier = User::find($supplierId);

        return view('farmer.inputs.order', compact('orders', 'supplier'));
    }

}
