<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class GeneratingUrls extends AbstractController
{
    /**
     * @Route("/generate-url/{param?}", name="generate-url")
     */
    public function generate_url()
    {
        exit($this->generateUrl('generate-url', ['param' => 10]));
    }
}