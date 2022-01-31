<?php
declare(strict_types=1);
namespace App\Jobs\Posts;

use Domain\Blogging\Actions\UpdatePost as UpdatePostAction;
use Domain\Blogging\Models\Post;
use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatePost implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public PostValueObject $object,
        public Post $post,
    ) {}

    public function handle()
    {
        UpdatePostAction::handle(
            object:  $this->object,
            post: $this->post,
        );
    }
}
