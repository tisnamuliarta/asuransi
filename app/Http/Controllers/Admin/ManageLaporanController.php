<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageLaporanController extends Controller
{
    public function member(UsersDataTable $dataTable)
    {
        return $dataTable->render("admin.report.member");
    }

    public function order()
    {
        return view("admin.report.order");
    }

    public function setoran()
    {
        return view("admin.report.setoran");
    }
}
