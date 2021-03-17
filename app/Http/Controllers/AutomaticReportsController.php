<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutomaticReportsController extends Controller
{
    /**
     * How to many reports showing in a page.
     *
     * @var int
     */
    public static $perPage = 10;

    /**
     * Get the reports to the home page.
     *
     * @param int $currentPage The current page to get the reports.
     *
     * @return array
     */
    public static function getReports($currentPage = 1)
    {
        // Set the output array.
        $reports = [];

        // First part. Get the reports in the BOT_OUTPUT_PATH environment variable.
        foreach (scandir(getenv("BOT_OUTPUT_PATH")) as $file) {
            if ($file === "." || $file === "..") {
                // Skip directories "." and ".."
                continue;
            }

            if (preg_match("/^\..*/", $file)) {
                // Skip dotfiles
                continue;
            }

            // Extract the report date from the filename.
            $reportDate = pathinfo($file, PATHINFO_FILENAME);

            // Push it to the output array.
            array_push($reports, $reportDate);
        }

        // Second part. Sort the reports according to the date.
        usort($reports, function ($a, $b) {
            return strtotime($a) - strtotime($b);
        });

        // Third part. Add pagination to the reports, showing 10 reports by page (by default).
        $offset = ($currentPage - 1) * self::$perPage;
        $totalReports = sizeof($reports);
        $totalPages = ceil($totalReports / self::$perPage);
        $reports = array_slice($reports, $offset, self::$perPage);

        return [
            "reports" => $reports,
            "pagination" => [
                "currentPage" => $currentPage,
                "totalReports" => $totalReports,
                "totalPages" => $totalPages,
            ],
        ];
    }

    /**
     * Show a page of automatic reports.
     *
     * @param int $page The page to show.
     */
    public function showPage($page)
    {
        $reports = $this->getReports($page);

        return view("automatic-report.showPage")->withReports($reports);
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
