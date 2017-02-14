<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Report;

class ReportingController extends Controller {

	public function createNewReport(Request $request) {
		$name = (!empty($request->input('internal_report_name')) ? $request->input('internal_report_name') : null);

		$report = new Report();
		$report->internal_report_name = $name;
		$report->company_id = User::where('api_key');
		$report->save();

		dd($report);
	}
}