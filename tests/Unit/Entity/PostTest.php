<?php
namespace App\Test\Unit\Entity;

use App\Entity\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase{
    public function testSetAndGet()
    {
        $post = new Post();
        $post->setTitle('test title');
        $post->setBody('test body');
        $this->assertEquals('test title', $post->getTitle());
        $this->assertEquals('test body', $post->getBody());
    }
}