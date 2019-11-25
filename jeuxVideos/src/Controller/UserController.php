<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use App\Form\UserType;


class UserController extends AbstractController
{   


    /**
     * @Route("/", name="home")
     */ 
     public function home(UserRepository $repo){

        return $this->render('user/home.html.twig', [
            "title" => "Benvenido a todos"]);
    }

    
}
