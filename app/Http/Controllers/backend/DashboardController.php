<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // màn hình dashboard thống kê website
    public function index(){

        // get data

        return view('backend.dashboard.index');
    }
}
