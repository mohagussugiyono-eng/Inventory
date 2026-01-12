<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AksesModel;
use App\Models\Admin\UserModel;
use App\Models\Admin\WebModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $data['web']   = WebModel::first();
        return view('Admin.Login.index', $data);
    }

    // public function proseslogin(Request $request)
    // {
    //     $where = [
    //         'tbl_user.user_nama'     => $request->user,
    //         'tbl_user.user_password' => md5($request->pwd),
    //     ];

    //     $user = UserModel::where($where)->first();

    //     if ($user) {
    //         $role = AksesModel::where('role_id', $user->role_id)->get();

    //         session([
    //             'user'      => $user,
    //             'user_role' => $role
    //         ]);

    //         Session::flash('status', 'success');
    //         Session::flash('msg', 'Selamat Datang ' . $user->user_nmlengkap);

    //         // 🔴 INI YANG DIPERBAIKI
    //         return redirect('/admin');
    //     }

    //     Session::flash('status', 'error');
    //     Session::flash('msg', 'User atau password salah');

    //     return redirect()->back();
    // }
    public function proseslogin(Request $request)
    {
        $where = [
            'tbl_user.user_nama'      => $request->user,
            'tbl_user.user_password' => md5($request->pwd),
        ];

        $user = UserModel::where($where)->first();

        if ($user) {

            $role = AksesModel::where('role_id', $user->role_id)->get();

            session([
                'user'      => $user,
                'user_role' => $role
            ]);

            Session::flash('status', 'success');
            Session::flash('msg', 'Selamat Datang ' . $user->user_nmlengkap);

            // ===============================
            // 🔴 LOGIC PENTING DI SINI
            // ===============================
            if ($user->role_id == 1 || $user->role_id == 2) {
                // admin / operator
                return redirect('/admin');
            } else {
                // user biasa
                return redirect('/admin/profile/' . $user->user_id);
            }
        }

        Session::flash('status', 'error');
        Session::flash('msg', 'User atau password salah');

        return redirect()->back();
    }

    public function logout()
    {
        Session::forget('user');
        Session::forget('user_role');

        // 🔴 INI JUGA DIPERBAIKI
        return redirect('/admin/login');
    }
}
