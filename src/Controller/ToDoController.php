<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ToDoController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_to_do')]
    public function index(): Response
    {
        $all_tasks = $this->entityManager->getRepository(Task::class)->findAll();

        return $this->render('to_do/index.html.twig', [
            'all_tasks' => $all_tasks,
        ]);
    }

    #[Route('/create', name: 'create_task', methods: "POST")]
    public function create(Request $request): Response
    {
        $new_task_title = trim($request->request->get('new_task_title'));

        if (empty($new_task_title)) {
            return $this->redirectToRoute('app_to_do');
        }

        $task = new Task();
        $task->setTitle($new_task_title);
        $this->entityManager->persist($task);
        $this->entityManager->flush();
        return $this->redirectToRoute('app_to_do');
    }

    #[Route('/delete/{id}', name: 'delete_task')]
    public function delete(Task $id): Response
    {
        $this->entityManager->remove($id);
        $this->entityManager->flush();
        return $this->redirectToRoute('app_to_do');
    }

    #[Route('/switch-status/{id}', name: 'switch_status')]
    public function switchStatus(Task $id): Response
    {
        $task = $this->entityManager->getRepository(Task::class)->find($id);

        $task->setStatus(!$task->getStatus());
        $this->entityManager->flush();

        return $this->redirectToRoute('app_to_do');
    }

}
