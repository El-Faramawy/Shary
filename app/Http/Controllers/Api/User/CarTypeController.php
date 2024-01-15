<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CarType\CarCategoryRequest;
use App\Http\Requests\Api\CarType\CarColorRequest;
use App\Http\Requests\Api\CarType\CarModelRequest;
use App\Http\Traits\PaginateTrait;
use App\Models\CarCategory;
use App\Models\CarColor;
use App\Models\CarModel;
use App\Models\CarType;

class CarTypeController extends Controller
{
    use PaginateTrait;

    public function car_types()
    {
        try {
            $data = CarType::query();
            return $this->apiResponse($data);
        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }
    }

    public function car_categories(CarCategoryRequest $request)
    {
        try {
            $data = CarCategory::where('car_type_id', $request->car_type_id);
            return $this->apiResponse($data);
        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }
    }

    public function car_models(CarModelRequest $request)
    {
        try {
            $data = CarModel::where('car_category_id', $request->car_category_id);
            return $this->apiResponse($data);
        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }
    }

    public function car_colors(CarColorRequest $request)
    {
        try {
            $data = CarColor::where('car_model_id', $request->car_model_id);
            return $this->apiResponse($data);
        } catch (\Exception $ex) {
            return $this->apiResponse($ex->getCode(), $ex->getMessage(), 'simple', '422');
        }
    }


}
