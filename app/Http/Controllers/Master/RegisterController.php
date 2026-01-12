<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UserModel;
use App\Models\Admin\WebModel;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $web = WebModel::first();

        return view('Admin.Login.register', [
            'title' => 'Register',
            'web'   => $web
        ]);
    }

    public function store(Request $request)
    {
        UserModel::create([
            'role_id'        => 4, // user Operator
            'user_nama'      => $request->user_nama,
            'user_nmlengkap' => $request->user_nmlengkap,
            'user_email'     => $request->user_email,
            'user_password'  => md5($request->password),
            'user_foto'      => 'default.png',
        ]);

        return redirect('/admin/login')
            ->with('success', 'Register berhasil, silakan login');
    }
}
