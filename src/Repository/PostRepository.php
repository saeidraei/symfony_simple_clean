<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function add(Post $post): Post
    {
        $this->getEntityManager()->persist($post);

        $this->getEntityManager()->flush();

        return $post;
    }

    public function remove(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function getAll(): array
    {
        return $this->findAll();
    }

    public function findOneById(int $id): ?Post
    {
        return $this->find($id);
    }

    public function update(Post $post): ?Post
    {
        //this code may seem odd but this is how doctrine works
        $originalPost = $this->findOneById($post->getId());
        $originalPost->setBody($post->getBody());
        $originalPost->setTitle($post->getTitle());
        $this->getEntityManager()->flush();

        return $post;
    }

    public function delete(int $id): bool
    {
        $post = $this->findOneById($id);
        $this->getEntityManager()->remove($post);
        $this->getEntityManager()->flush();

        //just returning true for now
        return true;
    }
}
