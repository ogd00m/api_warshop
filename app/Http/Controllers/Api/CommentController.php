<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $post_id) {

        if(Auth::check()) {

            $product = Product::find($post_id);

            $comment = Comment::create([
                'comment_body' => $request->comment_body,
                'product_id' => $product->id,
                'user_id' => Auth::id()
            ]);

            return response()->json([
                'message' => 'comment added',
                'comment' => $comment
            ]);
        }
    }

    public function update(CommentRequest $request, $id, $comment) {


            $comments = Comment::find($comment);

            if((Auth::check() && (Auth::id() == $comments->user_id))) {

                $comments->update($request->all());

                return response()->json([
                    'message' => 'comment updated',
                    'comment' => $comment
                ]);
            } else {
                return response()->json([
                    'message' => 'auth errors'
                ]);
            }

    }

    public function destroy($id, $comment) {

        $comments = Comment::find($comment);

        if((Auth::check() && (Auth::id() == $comments->user_id))) {

            $comments->delete();

            return response()->json([
                'message' => 'comment deleted',
                'comment' => $comment
            ]);
        } else {
            return response()->json([
                'message' => 'auth errors'
            ]);
        }
    }
}
