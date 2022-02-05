<?php

namespace App\Http\Controllers\Web\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use Domain\Blogging\Aggregates\PostAggregate;
use Domain\Blogging\Factories\PostFactory;
use Domain\Blogging\Jobs\Posts\CreatePost;
use Domain\Blogging\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
//        PostAggregate::retrieve(
//            uuid: Str::uuid()->toString(),
//        )->createPost(
//            object: PostFactory::create(array_merge(
//                    $request->validated(),
//                    ['user_id' => 1]
//                )
//            ),
//            userID: 1,
//        )->persist();

        CreatePost::dispatch(
            PostFactory::create(
                attributes: $request->validated(),
            )
        );
        return redirect()->route('home');
    }
}
