<?php

namespace App\UseCase\Post;

use App\Entity\Post;

final class StoreUseCase extends BaseUseCase
{

    public function execute(Post $post): array
    {
        return $this->postRepository->add($post)->toArray();
    }
}