<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Report;
use App\Issue;


class IssueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getIssueById($issueId, $reportId) {
        return response(Issue::where('report_id', $reportId)->first());
    }


    public function addNewIssueToReport(Request $request) {
        
        $issue = new Issue();

        $issue->report_id         = $request->input('report_id');
        $issue->type_id           = $request->input('type_id');
        $issue->author_id         = User::where('api_token', $request->input('api_token'))->first(['id']);
        $issue->title             = $request->input('title');
        $issue->introduction      = $request->input('introduction');
        $issue->technical_details = $request->input('technical_details');
        $issue->remediation       = $request->input('remediation');
        $issue->uploads           = $request->input('uploads');
        $issue->cvss              = $request->input('cvss');
        $issue->custom_severity   = $request->input('custom_severity');

        $return = '';

        if($issue->save()) {
            $return = [
                'success' => true,
                'issue_id' => $issue->id,
            ];
        }

        return response($return);
    }
}
