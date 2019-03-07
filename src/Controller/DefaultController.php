<?php
/**
 * Created by PhpStorm.
 * User: rudymalhomme
 * Date: 04/03/2019
 * Time: 15:11
 */
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /**
     * @Route("/start", name="action_show")
     */
    public function myAction()
    {
        return new Response('Le contenu de ma réponse');
    }
}