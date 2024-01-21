<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Package\StorePackageRequest;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\PhotoTrait;
use App\Http\Traits\WithRelationTrait;
use App\Models\Commission;
use App\Models\Package;
use App\Models\UserPackage;

class PackageController extends Controller
{
    use WithRelationTrait, PaginateTrait, PhotoTrait;

    public function store(StorePackageRequest $request)
    {
        $data = $request->only('package_id');
        $package = Package::where('id', $request->package_id)->first();
        $data['user_id'] = user_api()->user()->id;
        $data['start_date'] = date('Y-m-d');

        $userOldPackage = user_api()->user()->package;
        if ($userOldPackage) {
            if ($userOldPackage->id == $package->id) {
                if (date('Y-m-d') >= $userOldPackage->end_date) {
                    $data['end_date'] = date('Y-m-d', strtotime('+' . $package->period . 'month'));
                } else {
                    $data['end_date'] = date('Y-m-d', strtotime($userOldPackage->end_date . '+' . $package->period . 'month'));
                }
            } else {
                $data['end_date'] = date('Y-m-d', strtotime('+' . $package->period . 'month'));
            }

        } else {
            $data['end_date'] = date('Y-m-d', strtotime('+' . $package->period . 'month'));
        }
        UserPackage::where('user_id', user_api()->id())->delete();
        $userPackage = UserPackage::create($data);

        user_api()->user()->update(['verified' => 1]);

        Commission::where('user_id',user_api()->id())->delete();

        return $this->apiResponse($userPackage, '', 'simple');
    }

    //================================================================
    public function packages()
    {
        $data = Package::query();
        return $this->apiResponse($data);
    }
}
