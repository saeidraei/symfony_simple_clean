<?php

namespace App\Repository;

use App\Entity\Post;

interface PostRepositoryInterface{
    public function getAll():array;
    public function add(Post $post): ?Post;
    public function findOneById(int $id):?Post;
    public function update(Post $post): ?Post;
    public function delete(int $id): bool;
}
