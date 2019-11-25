<?php

namespace App\Controller;

use App\Entity\DevellopementStudio;
use App\Form\DevellopementStudioType;
use App\Repository\DevellopementStudioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/devellopement-studio")
 */
class DevellopementStudioController extends AbstractController {
	/**
	 * @Route("/", name="devellopement_studio_index", methods={"GET"})
	 */
	public function index(DevellopementStudioRepository $devellopementStudioRepository): Response {
		return $this->render('devellopement_studio/index.html.twig', [
			'devellopement_studios' => $devellopementStudioRepository->findAll(),
		]);
	}

	/**
	 * @Route("/new", name="devellopement_studio_new", methods={"GET","POST"})
	 */
	public function new (Request $request): Response{
		$devellopementStudio = new DevellopementStudio();
		$form = $this->createForm(DevellopementStudioType::class, $devellopementStudio);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($devellopementStudio);
			$entityManager->flush();

			return $this->redirectToRoute('devellopement_studio_index');
		}

		return $this->render('devellopement_studio/new.html.twig', [
			'devellopement_studio' => $devellopementStudio,
			'form' => $form->createView(),
		]);
	}

	/**
	 * @Route("/{id}", name="devellopement_studio_show", methods={"GET"})
	 */
	public function show(DevellopementStudio $devellopementStudio): Response {
		return $this->render('devellopement_studio/show.html.twig', [
			'devellopement_studio' => $devellopementStudio,
		]);
	}

	/**
	 * @Route("/{id}/edit", name="devellopement_studio_edit", methods={"GET","POST"})
	 */
	public function edit(Request $request, DevellopementStudio $devellopementStudio): Response{
		$form = $this->createForm(DevellopementStudioType::class, $devellopementStudio);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('devellopement_studio_index');
		}

		return $this->render('devellopement_studio/edit.html.twig', [
			'devellopement_studio' => $devellopementStudio,
			'form' => $form->createView(),
		]);
	}

	/**
	 * @Route("/{id}", name="devellopement_studio_delete", methods={"DELETE"})
	 */
	public function delete(Request $request, DevellopementStudio $devellopementStudio): Response {
		if ($this->isCsrfTokenValid('delete' . $devellopementStudio->getId(), $request->request->get('_token'))) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove($devellopementStudio);
			$entityManager->flush();
		}

		return $this->redirectToRoute('devellopement_studio_index');
	}
}
