<?php
namespace App\Tests\Unit\UseCase\Post;

use App\Repository\Fake\PostRepository;
use App\UseCase\Post\IndexUseCase;
use App\UseCase\Post\ShowUseCase;
use PHPUnit\Framework\TestCase;

class ShowUseCaseTest extends TestCase{
    public function testExecuteNormalCase()
    {
        $postRepository = new PostRepository();
        $indexUseCase = new ShowUseCase($postRepository);
        $post = $indexUseCase->execute(1);
        $this->assertEquals('test title 1',$post['title']);
        $this->assertEquals('test body 1',$post['body']);
    }
}
