<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Method untuk menampilkan daftar user
    public function index()
    {
        $search = request('search');
        if ($search) {
            $users = User::with('todos')->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        } else {
            $users = User::with('todos')-> where('id', '!=', 1)
                ->orderBy('name')
                ->paginate(10);
        }
        return view('user.index', compact('users'));
    }

    // Method untuk menghapus user
    public function destroy(User $user)
    {
        if ($user->id != 1) {
            $user->delete(); // Hapus user jika bukan user dengan ID 1
            return back()->with('success', 'delete user successfully!');
        } else {
            // Jika user dengan ID 1, tidak diizinkan dihapus
            return redirect()->route('user.index')->with('danger', 'Delete user failed!');
        }
    }

    // Method untuk memberikan hak admin ke user
    public function makeadmin(User $user)
    {
        $user->timestamps = false; // Nonaktifkan update timestamps (updated_at tidak berubah)
        $user->is_admin = true; // Set kolom is_admin menjadi true
        $user->save(); // Simpan perubahan

        return back()->with('success', 'Make Admin Successfully!');
    }

    // Method untuk menghapus hak admin dari user
    public function removeadmin(User $user)
    {
        if ($user->id != 1) {
            $user->timestamps = false; // Nonaktifkan update timestamps
            $user->is_admin = false; // Set kolom is_admin menjadi false
            $user->save(); // Simpan perubahan

            return back()->with('success', 'Remove Admin Successfully!');
        } else {
            // Jika user ID 1, jangan hapus hak admin
            return redirect()->route('user.index');
        }
    }
}
