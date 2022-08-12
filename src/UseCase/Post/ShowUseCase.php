<?php

namespace App\UseCase\Post;

use App\Entity\Post;

final class ShowUseCase extends BaseUseCase
{
    public function execute(int $id): array
    {
        return $this->postRepository->findOneById($id)->toArray();
    }
}