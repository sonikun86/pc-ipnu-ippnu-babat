<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return view('dashboard.admin', [
                'activeMembersCount' => Member::where('status', 'aktif')->count(),
                'postsCount' => Post::count(),
            ]);
        } elseif ($user->role === 'pengurus') {
            return view('dashboard.pengurus', [
                'activeMembers' => Member::where('status', 'aktif')->get(),
            ]);
        } else {
            return view('dashboard.anggota', [
                'activeMembers' => Member::where('status', 'aktif')->get(),
            ]);
        }
    }
}
