<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\AdPackage;

class PackageController extends Controller
{
    use  PaginateTrait ;

    public function packages()
    {
        $data = AdPackage::query();
        return $this->apiResponse($data);
    }
}
