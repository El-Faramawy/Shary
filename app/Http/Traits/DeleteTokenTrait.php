<?php

namespace App\Http\Traits;

use App\Models\PhoneToken;

trait  DeleteTokenTrait
{
    function delete($token)
    {
        PhoneToken::where('phone_token', $token)->delete();
    }

}
