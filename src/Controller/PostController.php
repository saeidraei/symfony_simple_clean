<?php

namespace App\Controller;

use App\Entity\Post;
use App\UseCase\Post\DeleteUseCase;
use App\UseCase\Post\StoreUseCase;
use App\UseCase\Post\IndexUseCase;
use App\UseCase\Post\ShowUseCase;
use App\UseCase\Post\UpdateUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/posts', name: 'post_index', methods: ['GET'])]
    public function index(IndexUseCase $indexUseCase): JsonResponse
    {
        return $this->json($indexUseCase->execute());
    }

    #[Route('/posts/{id}', name: 'post_show', methods: ['get'])]
    public function show(int $id, ShowUseCase $showUseCase)
    {
        return $this->json($showUseCase->execute($id));
    }

    #[Route('/posts', name: 'post_store', methods: ['POST'])]
    public function store(Request $request, StoreUseCase $storeUseCase): JsonResponse
    {
        $post = new Post();
        $post->setTitle($request->get('title'));
        $post->setBody($request->get('body'));
        return $this->json($storeUseCase->execute($post));
    }

    #[Route('/posts/{id}', name: 'post_update', methods: ['PUT'])]
    public function update(int $id, Request $request, UpdateUseCase $updateUseCase): JsonResponse
    {
        $post = new Post();
        $post->setId($id);
        $post->setTitle($request->get('title'));
        $post->setBody($request->get('body'));
        return $this->json($updateUseCase->execute($post));
    }

    #[Route('/posts/{id}', name: 'post_delete', methods: ['DELETE'])]
    public function delete(int $id, DeleteUseCase $deleteUseCase): JsonResponse
    {

        return $this->json(['success' => $deleteUseCase->execute($id)]);
    }

}
