<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Candidate;
use App\Models\Admin\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
            'candidates' => Candidate::all(),
            'transactions' => Transaction::all()
        ];

        return view('admin.index', $data);
    }
}
