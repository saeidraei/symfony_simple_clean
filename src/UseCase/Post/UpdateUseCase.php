<?php

namespace App\UseCase\Post;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;

final class UpdateUseCase extends BaseUseCase
{
    public function execute(Post $post): array
    {
        return $this->postRepository->update($post)->toArray();
    }
}