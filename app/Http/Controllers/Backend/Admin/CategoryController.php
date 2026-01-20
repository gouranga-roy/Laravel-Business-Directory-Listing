<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $page_data['list_type'] = Type::get();
        return view('admin::category.index', $page_data);
    }
}
