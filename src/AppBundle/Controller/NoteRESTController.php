<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Note;
use AppBundle\Form\NoteType;

use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View as FOSView;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations

use Voryx\RESTGeneratorBundle\Controller\VoryxController;

/**
* Note controller.
* @RouteResource("Note")
*/
class NoteRESTController extends VoryxController
{
  /**
  * Get a Note entity
  *
  * @View(serializerEnableMaxDepthChecks=true)
  *
  * @return Response
  *
  */
  public function getAction(Note $entity)
  {
    return $entity;
  }

  /**
  * Get all Note entities.
  *
  * @View(serializerEnableMaxDepthChecks=true)
  *
  * @param ParamFetcherInterface $paramFetcher
  *
  * @return Response
  *
  * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing notes.")
  * @QueryParam(name="limit", requirements="\d+", default="20", description="How many notes to return.")
  * @QueryParam(name="order_by", nullable=true, array=true, description="Order by fields. Must be an array ie. &order_by[name]=ASC&order_by[description]=DESC")
  * @QueryParam(name="filters", nullable=true, array=true, description="Filter by fields. Must be an array ie. &filters[id]=3")
  */
  public function cgetAction(ParamFetcherInterface $paramFetcher, Request $request)
  {
    try {
      $offset = $paramFetcher->get('offset');
      $limit = $paramFetcher->get('limit');
      $order_by = $paramFetcher->get('order_by');
      $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

      $em = $this->getDoctrine()->getManager();
      $entities = $em->getRepository('AppBundle:Note')->findBy($filters, $order_by, $limit, $offset);

      $notes = array();

      if ($entities) {
        return $entities;
      }

      return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
    } catch (\Exception $e) {
      return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  /**
  * Get all Note entities.
  *
  * @View(serializerEnableMaxDepthChecks=true)
  * @Rest\Get("/students/{student_id}/notes")
  *
  * @param ParamFetcherInterface $paramFetcher
  *
  * @return Response
  *
  * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing notes.")
  * @QueryParam(name="limit", requirements="\d+", default="20", description="How many notes to return.")
  * @QueryParam(name="order_by", nullable=true, array=true, description="Order by fields. Must be an array ie. &order_by[name]=ASC&order_by[description]=DESC")
  * @QueryParam(name="filters", nullable=true, array=true, description="Filter by fields. Must be an array ie. &filters[id]=3")
  */
  public function cgetNotesByStudentIDAction(ParamFetcherInterface $paramFetcher, Request $request)
  {
    try {
      $offset = $paramFetcher->get('offset');
      $limit = $paramFetcher->get('limit');
      $order_by = $paramFetcher->get('order_by');
      $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

      $em = $this->getDoctrine()->getManager();
      $entities = $em->getRepository('AppBundle:Note')->findBy($filters, $order_by, $limit, $offset);

      $notes = array();

      if ($entities) {

        foreach ($entities as $note)
        {
          if($note->getStudent()->getId() == $request->get('student_id'))
          {
            array_push($notes,$note);
          }
        }
        return $notes;

      }

      return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
    } catch (\Exception $e) {
      return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
    }
  }




  /**
  * Get all Note entities.
  *
  * @View(serializerEnableMaxDepthChecks=true)
  * @Rest\Get("/labgroups/{labgroup_id}/notes")
  *
  * @param ParamFetcherInterface $paramFetcher
  *
  * @return Response
  *
  * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing notes.")
  * @QueryParam(name="limit", requirements="\d+", default="20", description="How many notes to return.")
  * @QueryParam(name="order_by", nullable=true, array=true, description="Order by fields. Must be an array ie. &order_by[name]=ASC&order_by[description]=DESC")
  * @QueryParam(name="filters", nullable=true, array=true, description="Filter by fields. Must be an array ie. &filters[id]=3")
  */
  public function cgetNotesByLabIDAction(ParamFetcherInterface $paramFetcher, Request $request)
  {
    try {
      $offset = $paramFetcher->get('offset');
      $limit = $paramFetcher->get('limit');
      $order_by = $paramFetcher->get('order_by');
      $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

      $em = $this->getDoctrine()->getManager();
      $entities = $em->getRepository('AppBundle:Note')->findBy($filters, $order_by, $limit, $offset);

      $notes = array();

      if ($entities) {

        foreach ($entities as $note)
        {
          if($note->getStudent()->getLabgroup()->getId() == $request->get('labgroup_id'))
          {
            array_push($notes,$note);
          }
        }
        return $notes;

      }

      return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
    } catch (\Exception $e) {
      return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
    }
  }


  /**
  * Get all Note entities.
  *
  * @View(serializerEnableMaxDepthChecks=true)
  * @Rest\Get("/modules/{module_id}/notes")
  *
  * @param ParamFetcherInterface $paramFetcher
  *
  * @return Response
  *
  * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing notes.")
  * @QueryParam(name="limit", requirements="\d+", default="20", description="How many notes to return.")
  * @QueryParam(name="order_by", nullable=true, array=true, description="Order by fields. Must be an array ie. &order_by[name]=ASC&order_by[description]=DESC")
  * @QueryParam(name="filters", nullable=true, array=true, description="Filter by fields. Must be an array ie. &filters[id]=3")
  */
  public function cgetNotesByModuleIDAction(ParamFetcherInterface $paramFetcher, Request $request)
  {
    try {
      $offset = $paramFetcher->get('offset');
      $limit = $paramFetcher->get('limit');
      $order_by = $paramFetcher->get('order_by');
      $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

      $em = $this->getDoctrine()->getManager();
      $entities = $em->getRepository('AppBundle:Note')->findBy($filters, $order_by, $limit, $offset);

      $notes = array();

      if ($entities) {

        foreach ($entities as $note)
        {
          if($note->getModule()->getId() == $request->get('module_id'))
          {
            array_push($notes,$note);
          }
        }
        return $notes;

      }

      return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
    } catch (\Exception $e) {
      return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
    }
  }



  /**
  * Get all Note entities.
  *
  * @View(serializerEnableMaxDepthChecks=true)
  * @Rest\Get("/students/{student_id}/modules/{module_id}/notes")
  *
  * @param ParamFetcherInterface $paramFetcher
  *
  * @return Response
  *
  * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing notes.")
  * @QueryParam(name="limit", requirements="\d+", default="20", description="How many notes to return.")
  * @QueryParam(name="order_by", nullable=true, array=true, description="Order by fields. Must be an array ie. &order_by[name]=ASC&order_by[description]=DESC")
  * @QueryParam(name="filters", nullable=true, array=true, description="Filter by fields. Must be an array ie. &filters[id]=3")
  */
  public function cgetOneNoteAction(ParamFetcherInterface $paramFetcher, Request $request)
  {
    try {
      $offset = $paramFetcher->get('offset');
      $limit = $paramFetcher->get('limit');
      $order_by = $paramFetcher->get('order_by');
      $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

      $em = $this->getDoctrine()->getManager();
      $entities = $em->getRepository('AppBundle:Note')->findBy($filters, $order_by, $limit, $offset);

      $notes = array();

      if ($entities) {

        foreach ($entities as $note)
        {
          if($note->getStudent()->getId() == $request->get('student_id') && $note->getModule()->getId() == $request->get('module_id'))
          {
            array_push($notes,$note);
          }
        }
        return $notes;

      }

      return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
    } catch (\Exception $e) {
      return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
    }
  }






  /**
  * Create a Note entity.
  *
  * @View(statusCode=201, serializerEnableMaxDepthChecks=true)
  *
  * @param Request $request
  *
  * @return Response
  *
  */
  public function postAction(Request $request)
  {
    $entity = new Note();
    $form = $this->createForm(get_class(new NoteType()), $entity, array("method" => $request->getMethod()));
    $this->removeExtraFields($request, $form);
    $form->handleRequest($request);

    if (true) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($entity);
      $em->flush();

      return $entity;
    }

    return FOSView::create(array('errors' => $form->getErrors()), Codes::HTTP_INTERNAL_SERVER_ERROR);
  }
  /**
  * Update a Note entity.
  *
  * @View(serializerEnableMaxDepthChecks=true)
  *
  * @param Request $request
  * @param $entity
  *
  * @return Response
  */
  public function putAction(Request $request, Note $entity)
  {
    try {
      $em = $this->getDoctrine()->getManager();
      $request->setMethod('PATCH'); //Treat all PUTs as PATCH
      $form = $this->createForm(get_class(new NoteType()), $entity, array("method" => $request->getMethod()));
      $this->removeExtraFields($request, $form);
      $form->handleRequest($request);
      if (true) {
        $em->flush();

        return $entity;
      }

      return FOSView::create(array('errors' => $form->getErrors()), Codes::HTTP_INTERNAL_SERVER_ERROR);
    } catch (\Exception $e) {
      return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
    }
  }
  /**
  * Partial Update to a Note entity.
  *
  * @View(serializerEnableMaxDepthChecks=true)
  *
  * @param Request $request
  * @param $entity
  *
  * @return Response
  */
  public function patchAction(Request $request, Note $entity)
  {
    return $this->putAction($request, $entity);
  }
  /**
  * Delete a Note entity.
  *
  * @View(statusCode=204)
  *
  * @param Request $request
  * @param $entity
  *
  * @return Response
  */
  public function deleteAction(Request $request, Note $entity)
  {
    try {
      $em = $this->getDoctrine()->getManager();
      $em->remove($entity);
      $em->flush();

      return null;
    } catch (\Exception $e) {
      return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
    }
  }
}
