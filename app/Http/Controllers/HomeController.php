<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Home page.
     */
    public function index()
    {
        $manualReports = ManualReportsController::getReports();
        $automaticReports = AutomaticReportsController::getReports();

        return view("home")
            ->withManualReports($manualReports)
            ->withAutomaticReports($automaticReports);
    }
}
