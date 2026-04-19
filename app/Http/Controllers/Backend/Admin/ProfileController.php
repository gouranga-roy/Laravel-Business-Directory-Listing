<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data['profile'] = Profile::first();

        return view('admin::profile.index', $data);
    }

    public function update(Request $request)
    {

    }
}
