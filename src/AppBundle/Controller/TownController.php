<?php

namespace AppBundle\Controller;

use AppBundle\Repository\TownRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TownController extends Controller
{
    public function autoCompleteAction(Request $request, $town)
    {
        if ($request->isXmlHttpRequest()){
            /**
             * @var $repository TownRepository
             */
            $repository = $this->getDoctrine()->getRepository('AppBundle:Town');
            $data = $repository->getTownLike('fr', $town);
            return new JsonResponse(array("data" => json_encode($data)));
        } else {
            throw new HttpException('500', 'Invalid call');
        }
    }
}
