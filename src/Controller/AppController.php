<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Entity\Result;
use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        $repositoryQuiz = $this->getDoctrine()->getRepository(Quiz::class);
        $quizzes = $repositoryQuiz->findAll();

        return $this->render('app/quizzes.html.twig', [
            'quizzes' => $quizzes,
        ]);
    }

    /**
     * @Route("/quiz/{idQuiz}", name="app_students")
     */
    public function students($idQuiz): Response
    {
        $repositoryQuiz = $this->getDoctrine()->getRepository(Quiz::class);
        $quiz = $repositoryQuiz->find($idQuiz);

        $repositoryStudent = $this->getDoctrine()->getRepository(student::class);
        $students = $repositoryStudent->findAll();

        return $this->render('app/candidats.html.twig', [
            'students' => $students,
            'quiz' => $quiz,
        ]);
    }

     /**
     * @Route("/result", name="app_result")
     */
    public function result(): Response
    {
        $repositoryResult = $this->getDoctrine()->getRepository(result::class);
        $results = $repositoryResult->findAll();

        return $this->render('app/results.html.twig', [
            'results' => $results,
        ]);
    }
}