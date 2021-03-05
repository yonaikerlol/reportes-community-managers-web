<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ManualReportsController extends Controller
{
    /**
     * Validation rules.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "content" => "required",
        ];
    }

    /**
     * Get the reports to the home page.
     *
     * @return object
     */
    public static function getReports(): object
    {
        $reports = Report::all();

        return $reports;
    }

    /**
     * Show the admin dashboard of reports.
     */
    public function showDashboard()
    {
        $reports = Report::where("user_id", Auth::user()->id)->get();
        $reportsCount = Report::where("user_id", Auth::user()->id)->count();

        return view("admin.report.index")
            ->withReportsCount($reportsCount)
            ->withReports($reports);
    }

    /**
     * Show the create form to add a report.
     */
    public function showCreateForm()
    {
        return view("admin.report.create");
    }

    /**
     * Store a Report.
     *
     * @param \Illuminate\Http\Request $request Form Data.
     */
    public function store(Request $request)
    {
        // Validate the input.
        $request->validate($this->rules());

        // Retrieve the input.
        $input = $request->all();

        // Set the user_id to the input.
        $input["user_id"] = Auth::user()->id;

        // Create the report.
        Report::create($input);

        // Redirect to the reports dashboard.
        return redirect(route("admin.reports.index"));
    }

    /**
     * Show a Report.
     *
     * @param int $id The id of the Report.
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);

        return view("manual-report.show")->withReport($report);
    }

    /**
     * Show the delete form to remove a report.
     *
     * @param int $id The id of the report.
     */
    public function showDeleteForm($id)
    {
        $report = Report::findOrFail($id);

        // Verify if the user that want delete is the same user of the report.
        if (Auth::user()->id !== $report->user_id) {
            abort(401); // Unathorized.
        }

        return view("admin.report.delete")->withReport($report);
    }

    /**
     * Remove a report.
     *
     * @param int $id The id of the report.
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        // Verify if the user that want delete is the same user of the report.
        if (Auth::user()->id !== $report->user_id) {
            abort(401); // Unathorized.
        }

        $report->delete();

        Session::flash("status", "Reporte eliminado satisfactoriamente");

        return redirect(route("admin.reports.index"));
    }

    /**
     * Show the edit form to update a report.
     *
     * @param int $id The id of the report.
     */
    public function showEditForm($id)
    {
        $report = Report::findOrFail($id);

        // Verify if the user that want delete is the same user of the report.
        if (Auth::user()->id !== $report->user_id) {
            abort(401); // Unathorized.
        }

        return view("admin.report.edit")->withReport($report);
    }

    /**
     * Update a report.
     *
     * @param \Illuminate\Http\Request $request The form data.
     * @param int $id The id of the report.
     */
    public function update(Request $request, $id)
    {
        // Validate the input.
        $request->validate($this->rules());

        // Retrieve the input.
        $input = $request->all();

        // Set the user_id to the input.
        $input["user_id"] = Auth::user()->id;

        // Find the report to update.
        $report = Report::findOrFail($id);

        // Verify if the user that want delete is the same user of the report.
        if (Auth::user()->id !== $report->user_id) {
            abort(401); // Unathorized.
        }

        // Update the report.
        $report->update($input);

        // Flash successfull message.
        Session::flash("status", "Reporte actualizado satisfactoriamente");

        // Redirect to the reports dashboard.
        return redirect(route("admin.reports.index"));
    }
}
