<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Form\GradeType;
use AppBundle\Entity\Grade;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("/admin/notes")
 */
class GradeController extends Controller
{

    /**
     * @Route("/", name="back_grades_index")
     * @Template
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $grades = $em->getRepository('AppBundle:Grade')->findAll();

        return array('grades' => $grades);
    }


    /**
     * @Route("/ajouter", name="back_grades_add")
     * @Template
     */
    public function addAction(Request $request)
    {

        $grade = new Grade();

    	$form = $this->createForm(new GradeType(), $grade);

    	if($form->handlerequest($request)->isValid()){

    		$em = $this->getDoctrine()->getManager();
            $em->persist($grade);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('back', 'Utilisateur ajouté');

    		return $this->redirect($this->generateUrl('back_grades_index'));
    	}

    	return array('form' => $form->createView());
    }


    /**
     * @Route("/modifier/{id}", name="back_grades_edit")
     * @Template
     */
    public function editAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $grade = $em->getRepository('AppBundle:Grade')->findOneById($id);

        if (!$grade) {
            throw new NotFoundHttpException("Cet utilisateur n'existe pas"); //Sécurité
        }

    	$form  = $this->createForm(new GradeType(), $grade); // on génère le form

    	if($form->handlerequest($request)->isValid()){

            $em->persist($grade);
            $em->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('back', 'Utilisateur modifié');


    		return $this->redirect($this->generateUrl('back_grades_index'));
    	}

        return array('form' => $form->createView());
    }

    /**
    * @Route("/supprimer/{id}", name="back_grades_delete")
    * @Template
    */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $grade = $em->getRepository('AppBundle:Grade')->find($id);

        if (!$grade) {
            throw new NotFoundHttpException("Cet utilisateur n'existe pas"); //Sécurité
        }

        $em->remove($grade);
        $em->flush();

        $session = $request->getSession();
        $session->getFlashBag()->add('back', 'Utilisateur supprimé');

        return $this->redirect($this->generateUrl('back_grades_index'));
    }


    /**
    * @Route("/api", name="back_grades_api")
    */
    public function apiIndexAction() {

        $em = $this->getDoctrine()->getManager();
        $grade = $em->getRepository('AppBundle:Grade')->findAllArray();

        return new JsonResponse($grade);


    }
}
