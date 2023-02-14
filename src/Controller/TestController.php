<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class TestController extends AbstractController
{
    #[Route('/hello/{name}', methods: ['GET'])]
    public function index(string $name)
    {
        return $this->render('test/index.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/api/hello/{name}', methods: ['GET'])]
    public function apiHello(string $name)
    {
        return $this->json([
            'name' => $name,
            'symfony' => 'rocks',
        ]);
    }
}