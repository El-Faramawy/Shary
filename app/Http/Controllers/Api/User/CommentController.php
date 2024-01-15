<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comment\AddCommentRequest;
use App\Http\Requests\Api\Comment\AddReplyRequest;
use App\Http\Traits\NotificationTrait;
use App\Http\Traits\PaginateTrait;
use App\Models\ProductComment;
use App\Models\ProductReply;

class CommentController extends Controller
{
    use  PaginateTrait;
    use  NotificationTrait;

    public function add_comment(AddCommentRequest $request)
    {
        $data = $request->only('comment', 'product_id');
        $data['user_id'] = user_api()->id();
        $comment = ProductComment::create($data);

        $comment = ProductComment::where('id',$comment->id)->with('user')->first();
        $this->sendFCMNotification([$comment->product->user_id], 'لديك كومنت جديد', $comment->comment );

        return $this->apiResponse($comment, 'done', 'simple');
    }

    public function add_reply(AddReplyRequest $request)
    {
        $data = $request->only('comment_id', 'reply');
        $data['user_id'] = user_api()->id();
        $comment = ProductReply::create($data);

        $comment = ProductReply::where('id',$comment->id)->with('user')->first();
        $this->sendFCMNotification([$comment->user_id], 'لديك رد جديد', $comment->reply );

        return $this->apiResponse($comment, 'done', 'simple');
    }


}
