<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FakeDataStore;

class AdminController extends Controller
{
    public function index()
    {
        FakeDataStore::seed();

        return view('admin.index');
    }
}