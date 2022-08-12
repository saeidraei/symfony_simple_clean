<?php
namespace App\Tests\Unit\UseCase\Post;

use App\Repository\Fake\PostRepository;
use App\UseCase\Post\IndexUseCase;
use PHPUnit\Framework\TestCase;

class IndexUseCaseTest extends TestCase{
    public function testExecuteNormalCase()
    {
        $postRepository = new PostRepository();
        $indexUseCase = new IndexUseCase($postRepository);
        $posts = $indexUseCase->execute();
        $this->assertCount(2,$posts);
        $this->assertEquals('test title 1',$posts[0]['title']);
        $this->assertEquals('test body 1',$posts[0]['body']);
        $this->assertEquals('test title 2',$posts[1]['title']);
        $this->assertEquals('test body 2',$posts[1]['body']);
    }
}
