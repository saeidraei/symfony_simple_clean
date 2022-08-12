<?php
namespace App\Tests\Unit\UseCase\Post;

use App\Entity\Post;
use App\Repository\Fake\PostRepository;
use App\UseCase\Post\DeleteUseCase;
use App\UseCase\Post\StoreUseCase;
use App\UseCase\Post\IndexUseCase;
use App\UseCase\Post\UpdateUseCase;
use PHPUnit\Framework\TestCase;

class DeleteUseCaseTest extends TestCase{
    public function testExecuteNormalCase()
    {
        $postRepository = new PostRepository();
        $indexUseCase = new DeleteUseCase($postRepository);

        $indexUseCase->execute(1);

        $this->assertNull($postRepository->findOneById(1));
        }
}
