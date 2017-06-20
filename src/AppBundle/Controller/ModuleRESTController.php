<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Module;
use AppBundle\Form\ModuleType;

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
 * Module controller.
 * @RouteResource("Module")
 */
class ModuleRESTController extends VoryxController
{
    /**
     * Get a Module entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @return Response
     *
     */
    public function getAction(Module $entity)
    {
        return $entity;
    }
    /**
     * Get all Module entities.
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
    public function cgetAction(ParamFetcherInterface $paramFetcher)
    {
        try {
            $offset = $paramFetcher->get('offset');
            $limit = $paramFetcher->get('limit');
            $order_by = $paramFetcher->get('order_by');
            $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('AppBundle:Module')->findBy($filters, $order_by, $limit, $offset);
            if ($entities) {
                return $entities;
            }

            return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



    /**
     * Get all Module entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @Rest\Get("units/{unit_id}/modules")
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
    public function cgetModuleByUnitIdAction(ParamFetcherInterface $paramFetcher, Request $request)
    {
        try {
            $offset = $paramFetcher->get('offset');
            $limit = $paramFetcher->get('limit');
            $order_by = $paramFetcher->get('order_by');
            $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('AppBundle:Module')->findBy($filters, $order_by, $limit, $offset);

            $modules = array();
            if ($entities) {
                              foreach ($entities as $module)
                              {
                                      if($module->getUnit()->getId() == $request->get('unit_id'))
                                      {
                                        array_push($modules,$module);
                                      }

                              }
                              return $modules;
            }

            return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



        /**
         * Get all Module entities.
         *
         * @View(serializerEnableMaxDepthChecks=true)
         * @Rest\Get("semesters/{semester_id}/modules")
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
        public function cgetModuleBySemesterIdAction(ParamFetcherInterface $paramFetcher, Request $request)
        {
            try {
                $offset = $paramFetcher->get('offset');
                $limit = $paramFetcher->get('limit');
                $order_by = $paramFetcher->get('order_by');
                $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

                $em = $this->getDoctrine()->getManager();
                $entities = $em->getRepository('AppBundle:Module')->findBy($filters, $order_by, $limit, $offset);

                $modules = array();
                if ($entities) {
                                  foreach ($entities as $module)
                                  {
                                          if($module->getUnit()->getSemester()->getId() == $request->get('semester_id'))
                                          {
                                            array_push($modules,$module);
                                          }

                                  }
                                  return $modules;
                }

                return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
            } catch (\Exception $e) {
                return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
            }
        }




    /**
     * Get all Module entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @Rest\Get("teachers/{teacher_id}/modules")
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
    public function cgetModuleByTeacherIdAction(ParamFetcherInterface $paramFetcher, Request $request)
    {
        try {
            $offset = $paramFetcher->get('offset');
            $limit = $paramFetcher->get('limit');
            $order_by = $paramFetcher->get('order_by');
            $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('AppBundle:Module')->findBy($filters, $order_by, $limit, $offset);

            $modules = array();
            if ($entities) {
                              foreach ($entities as $module)
                              {
                                foreach (($module->getTeachers()) as $teacher)
                                {
                                      if($teacher->getId() == $request->get('teacher_id'))
                                      {
                                        array_push($modules,$module);
                                      }
                                }

                              }
                              return $modules;
            }

            return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * Create a Module entity.
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
        $entity = new Module();
        $form = $this->createForm(get_class(new ModuleType()), $entity, array("method" => $request->getMethod()));
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
     * Update a Module entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function putAction(Request $request, Module $entity)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $request->setMethod('PATCH'); //Treat all PUTs as PATCH
            $form = $this->createForm(get_class(new ModuleType()), $entity, array("method" => $request->getMethod()));
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
     * Partial Update to a Module entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function patchAction(Request $request, Module $entity)
    {
        return $this->putAction($request, $entity);
    }
    /**
     * Delete a Module entity.
     *
     * @View(statusCode=204)
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function deleteAction(Request $request, Module $entity)
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
