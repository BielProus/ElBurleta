<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Asegúrate de tener una vista en "resources/views/admin/dashboard.blade.php"
    }
}
