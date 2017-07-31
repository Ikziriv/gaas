<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Watchdog\WatchdogRepository;
use App\Models\User;
use Auth;
use Setting;

class UserController extends Controller
{

	public function index()
	{
        $users = DB::table('users')->get();
        return view('admin.pages.user.index', ['users' => $users]);
	}

    public function pageUserProfile()
    {
        return view('admin.pages.user.profile');
    }

    public function pageActivities(WatchdogRepository $watchdog, Request $request)
    {
        $rows = $watchdog->getUserActivityList(Auth::user()->id, []);
        $options = null;

        return view('admin.pages.user.log.watchdog', compact('rows', 'options'));
    }

    public function deleteActivities()
    {
        DB::table('logs')->delete();
        return redirect()->back();
        flash('Delete Success', 'success');
    }

    public function postHandlePasswordChange()
    {
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');
        $confirmPassword = $request->input('confirm_password');

        $credentials = [
            'username' => Auth::user()->username,
            'password' => $currentPassword
        ];

        if (Auth::attempt($credentials)) {
            Auth::user()->password = bcrypt($confirmPassword);
            Auth::user()->save();

            flash('Your password is now changed.');
            return redirect()->back();
        }

        flash('Check if your current password is correct.', 'warning');
        return redirect()->back();

    }

	public function create()
	{
        return view('admin.pages.user.create');
	}

	public function edit()
	{
        return view('admin.pages.user.edit');
	}
}
