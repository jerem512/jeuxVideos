<<<<<<< Updated upstream
<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('pages/home.html.twig', [
            'current_menu' => 'home'
        ]);
    }
=======
<?php
namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @return Response
     * @param ArticleRepository $articleRepository
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('pages/home.html.twig', [
            'articles' => $articleRepository->findAll(),
            'current_menu' => 'home'
        ]);
    }
>>>>>>> Stashed changes
}