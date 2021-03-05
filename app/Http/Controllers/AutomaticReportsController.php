<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutomaticReportsController extends Controller
{
    /**
     * Get the reports to the home page.
     *
     * @return array
     */
    public static function getReports(): array
    {
        $reports = [];

        foreach (
            scandir(getenv("BOT_OUTPUT_PATH"))
            as $file
        ) {
            if ($file === "." || $file === "..") {
                // Skip directories "." and ".."
                continue;
            }

            if (preg_match("/^\..*/", $file)) {
                // Skip dotfiles
                continue;
            }

            // Extract the report date from the filename.
            $reportDate = explode(".", $file)[0];

            // Push it to the output array.
            array_push($reports, $reportDate);
        }

        return $reports;
    }

    /**
     * View a report.
     */
    public function show($date)
    {
        $reportFile = getenv("BOT_OUTPUT_PATH") . "/{$date}.json";

        if (!file_exists($reportFile)) {
            abort(404);
        } else {
            $report = json_decode(file_get_contents($reportFile));

            return view("automatic-report.show")
                ->withReport($report)
                ->withReportDate($date);
        }
    }
}
