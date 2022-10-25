<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);

        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::findOrFail($id);

        return view('admin.admin_profile_edit', compact('editData'));
    }
}