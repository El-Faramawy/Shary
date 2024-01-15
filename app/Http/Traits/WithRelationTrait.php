<?php

namespace App\Http\Traits;

trait WithRelationTrait
{

    private function productRelations()
    {
        return ['user', 'city', 'area'];
    }

    private function productAllRelations()
    {
        return ['images', 'area', 'city', 'user', 'comments.replies',
            'car_type', 'car_category', 'car_model', 'car_color'];
    }

    private function chatRelations()
    {
        return ['user'];
    }


}
