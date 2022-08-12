<?php

namespace App\UseCase\Post;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;

final class DeleteUseCase extends BaseUseCase
{
    public function execute(int $id): bool
    {
        return $this->postRepository->delete($id);
    }
}