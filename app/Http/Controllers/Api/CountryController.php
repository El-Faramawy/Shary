<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\City\AreaRequest;
use App\Http\Requests\Api\City\CityRequest;
use App\Http\Traits\PaginateTrait;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;

class CountryController extends Controller
{
    use PaginateTrait;
    public function countries()
    {
        try {
            $data = Country::query();
            return $this->apiResponse($data);
        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }
    }

    public function cities(CityRequest $request)
    {
        try {
            $data = City::where('country_id', $request->country_id);
            return $this->apiResponse($data);
        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }
    }

    public function areas(AreaRequest $request)
    {
        try {
            $data = Area::where('city_id', $request->city_id);
            return $this->apiResponse($data);
        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }
    }

}
