<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Issue;
use App\Report;

class ReportingController extends Controller {

	public function createNewReport(Request $request) {

		$name = (!empty($request->input('internal_report_name')) ? $request->input('internal_report_name') : null);

		$report = new Report();
		$report->internal_report_name = $name;
		// $report->company_id = User::where('api_token')->first(['company_id']);

		if($report->save()) {
			return response(['success' => true, 'report_id' => $report->id]);
		}

		return response(['success' => false]);
	}
}