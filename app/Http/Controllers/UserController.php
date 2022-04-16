<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexUsers()
    {
        $settings = Setting::getSettingCommon();
        return view('users.index', [
            'title' => 'Dashboard',
            'settings' => $settings,
        ]);
    }
}
