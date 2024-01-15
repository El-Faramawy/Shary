<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\ContactCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;

class ContactController extends Controller
{
    use PaginateTrait;

    public function contact_us(){
        $data = ContactCategory::with('contacts');
        return $this->apiResponse($data);
    }

}
