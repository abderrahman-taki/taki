<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AuthController extends BaseAuthController
{
    protected function sendLoginResponse(Request $request)
    {
        admin_toastr(trans('admin.login_successful'));
        $request->session()->regenerate();
        $roles = Arr::pluck($this->guard()->user()->roles, 'slug');

        if(in_array("administrator", $roles)) return redirect('/'.config('admin.route.prefix').'/orders');
        return redirect(config('admin.route.prefix'));
    }
}
