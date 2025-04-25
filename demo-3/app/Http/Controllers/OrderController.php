<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

/**
 * CRUD User controller
 */
class OrderController extends Controller
{
    public function oder(Request $request) {
        $role_id = $request->get('id');
        $role = Role::find($role_id);

       $data = [
           'role' => $role,
           'users' => $role->users
       ];

        return view('role.view', $data);
    }
    public function showProducts($id)
    {
        $order = Order::with('orderDetails.product')->findOrFail($id);

        return view('orders.products', compact('order'));
    }
}
