<?php
namespace App\UseCase\Post;

use App\Repository\PostRepositoryInterface;

abstract class BaseUseCase{
    protected PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
}
