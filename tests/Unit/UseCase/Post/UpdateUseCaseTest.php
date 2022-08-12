<?php
namespace App\Tests\Unit\UseCase\Post;

use App\Entity\Post;
use App\Repository\Fake\PostRepository;
use App\UseCase\Post\StoreUseCase;
use App\UseCase\Post\IndexUseCase;
use App\UseCase\Post\UpdateUseCase;
use PHPUnit\Framework\TestCase;

class UpdateUseCaseTest extends TestCase{
    public function testExecuteNormalCase()
    {
        $postRepository = new PostRepository();
        $indexUseCase = new UpdateUseCase($postRepository);
        $post = new Post();
        $post->setId(1);
        $post->setTitle('new test title');
        $post->setBody('new test body');
        $indexUseCase->execute($post);

        $fetchedPost = $postRepository->findOneById(1);
        $this->assertEquals('new test title',$fetchedPost->getTitle());
        $this->assertEquals('new test body',$fetchedPost->getBody());
        }
}
