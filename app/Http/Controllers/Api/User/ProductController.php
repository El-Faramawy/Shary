<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\OneProductRequest;
use App\Http\Requests\Api\Product\StoreProductRequest;
use App\Http\Requests\Api\Product\UserProductsRequest;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\PhotoTrait;
use App\Http\Traits\WithRelationTrait;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    use WithRelationTrait, PaginateTrait, PhotoTrait;

    public function store(StoreProductRequest $request)
    {
        $data = $request->except('images');
        $data['user_id'] = user_api()->id();
        $data['country_id'] = user_api()->user()->country_id;
        $product = Product::create($data);

        if (isset($request->images)){
            foreach ($request->images as $key=>$image) {
                $productImage = ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $this->saveImage($image, 'uploads/productImage')
                ]);
                if ($key == 0){
                    $product['image'] = $productImage->image;
                    $product->save();
                }
            }
        }

        if (isset($request->video_cover)){
            $product['video_cover'] = $this->saveImage($request->video_cover, 'uploads/product');
        }
        if (isset($request->video)){
            $product['video'] = $this->saveImage($request->video, 'uploads/product');
        }
        $product->save();

        return $this->apiResponse($product, '', 'simple');
    }

    public function update(StoreProductRequest $request , $id)
    {
        $data = $request->except('images' , 'remove_video');
        $data['user_id'] = user_api()->id();
        $product = Product::find($id);
        $product->update($data);
        if (isset($request->images)){
            $productImage = ProductImage::where('product_id',$id)->get();
            foreach($productImage as $image){
                $this->deleteImage($image->image);
                $image->delete();
            }

            foreach ($request->images as $key=>$image) {
                $productImage = ProductImage::create([
                    'product_id' => $id,
                    'image' => $this->saveImage($image, 'uploads/productImage')
                ]);
                if ($key == 0){
                    $product['image'] = $productImage->image;
                    $product->save();
                }
            }
        }

        if (isset($request->video_cover)){
            $product['video_cover'] = $this->saveImage($request->video_cover, 'uploads/product',$product['video_cover']);
        }
        if (isset($request->video)){
            $product['video'] = $this->saveImage($request->video, 'uploads/product',$product['video']);
        }
        if ($request->remove_video && $request->remove_video == 1){
            if (file_exists($product['video']))
                unlink($product['video']);
            if (file_exists($product['video_cover']))
                unlink($product['video_cover']);
            $product['video'] = $product['video_cover'] = null;
        }
        $product->save();
//        $product = Product::where('id', $product->id)->with($this->productRelations())->first();
        return $this->apiResponse($product, '', 'simple');

    }

    public function one_product(OneProductRequest $request){
        $product = Product::where('id',$request->id)->with($this->productAllRelations())
            ->withCount('comments')->first();

        return $this->apiResponse($product, '', 'simple');
    }

    public function user_products(UserProductsRequest $request){
        $data = Product::where('user_id', $request->user_id)->with($this->productRelations())
            ->withCount('comments');
        if ($request->user_id != user_api()->id() ){
            $data = $data->where('status' , 'active');
        }
        return $this->apiResponse($data);
    }

    public function delete(OneProductRequest $request){
        Product::where('id',$request->id)->delete();
        return $this->apiResponse('done', '', 'simple');
    }

}
