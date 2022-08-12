<?php

namespace App\Repository\Fake;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use Symfony\Component\DependencyInjection\Attribute\When;

#[When(env: 'test')]
class PostRepository implements PostRepositoryInterface
{

    private array $fakeData = [];

    private function initData()
    {
        $this->fakeData = [
            (new Post())->setId(1)->setTitle('test title 1')->setBody('test body 1'),
            (new Post())->setId(2)->setTitle('test title 2')->setBody('test body 2')
        ];
    }

    public function __construct()
    {
        $this->initData();
    }

    public function findOneById(int $id): ?Post
    {
        foreach ($this->fakeData as $model) {
            if ($model->getId() == $id) {
                return $model;
            }
        }
        return null;
    }

    public function add(Post $post): ?Post
    {
        $post->setId(999);
        $this->fakeData[] = $post;
        return $post;
    }

    public function getAll(): array
    {
        return $this->fakeData;
    }

    public function update(Post $post): ?Post
    {
        foreach ($this->fakeData as &$item){
            if($item->getId() == $post->getId()){
                $item = $post;
                return $post;
            }
        }

        return null;
    }

    public function delete(int $id): bool
    {
        foreach ($this->fakeData as $key => &$item){
            if($item->getId() == $id){
                unset($this->fakeData[$key]);

                return true;
            }
        }
        return false;
    }
}