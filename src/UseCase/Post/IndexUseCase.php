<?php

namespace App\UseCase\Post;

use App\Entity\Post;

final class IndexUseCase extends BaseUseCase
{
    public function execute(): array
    {
        $posts = $this->postRepository->getAll();
        $data = [];
        foreach ($posts as $post) {
            /** @var Post $post */
            $data[] = $post->toArray();
        }
        return $data;
    }
}