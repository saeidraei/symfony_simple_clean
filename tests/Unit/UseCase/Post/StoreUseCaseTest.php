<?php
namespace App\Tests\Unit\UseCase\Post;

use App\Entity\Post;
use App\Repository\Fake\PostRepository;
use App\UseCase\Post\StoreUseCase;
use PHPUnit\Framework\TestCase;

class StoreUseCaseTest extends TestCase{
    public function testExecuteNormalCase()
    {
        $postRepository = new PostRepository();
        $indexUseCase = new StoreUseCase($postRepository);
        $post = new Post();
        $post->setTitle('new test title');
        $post->setBody('new test body');
        $indexUseCase->execute($post);

        $fetchedPost = $postRepository->findOneById($post->getId());
        $this->assertEquals('new test title',$fetchedPost->getTitle());
        $this->assertEquals('new test body',$fetchedPost->getBody());
        }
}
