<?php
/**
 * Created by PhpStorm.
 * User: rudymalhomme
 * Date: 07/03/2019
 * Time: 13:56
 */

namespace App\Serializer\Listener;


use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;

class ArticleListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => Events::POST_SERIALIZE,
                'format' => 'json',
                'class' => 'App\Entity\Article',
                'method' => 'onPostSerialize',
            ]
        ];
    }

    public static function onPostSerialize(ObjectEvent $event)
    {
        // Possibilité de récupérer l'objet qui a été sérialisé
        $object = $event->getObject();

        $date = new \Datetime();
        // Possibilité de modifier le tableau après sérialisations
        $event->getVisitor()->addData('delivered_at', $date->format('l jS \of F Y h:i:s A'));
    }
}