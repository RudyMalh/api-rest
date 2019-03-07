<?php

namespace App\Controller;

use App\Entity\Article;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\Tests\Serializer\SerializableClass;
use JMS\SerializerBundle\DependencyInjection\JMSSerializerExtension;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use JMS\SerializerBundle\JMSSerializerBundle;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", methods={"POST"}, name="article_create")
     */
    public function createAction(Request $request, SerializerInterface $deserialize)
    {
        $data = $request->getContent();
        $article = $deserialize->deserialize($data, 'App\Entity\Article', 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }

    /**
     * @Route("/articles/{id}", name="article_show")
     */
    public function showAction(Article $article, SerializerInterface $serialize)
    {
        $data = $serialize->serialize($article, 'json', SerializationContext::create()->setGroups(array('list')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/articles", methods={"GET"}, name="article_list")
     */
    public function listAction(SerializerInterface $serialize)
    {
        $articles = $this->getDoctrine()->getRepository('App:Article')->findAll();
        $data = $serialize->serialize($articles, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
