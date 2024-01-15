<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Report\AddReportRequest;
use App\Http\Traits\PaginateTrait;
use App\Models\Report;

class ReportController extends Controller
{
    use PaginateTrait;

    public function add_report(AddReportRequest $request)
    {
        $data = $request->only('message', 'type', 'type_id');
        $data['user_id'] = user_api()->user()->id;
        $report = Report::create($data);

        return $this->apiResponse($report, 'done', 'simple');
    }


}
