<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RenderControllerMethodInTwig extends AbstractController
{
    protected array $topTen = ['one', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten'];

    /** @Route("/render-controller-method", name="render-controller-method") */
    public function index()
    {
        return $this->render('RenderControllerMethodInTwig/index.twig');
    }

    /**
     * @return Response
     */
    public function renderTopTen(): Response
    {
        $data['clients'] = $this->topTen;
        return $this->render('RenderControllerMethodInTwig/snippets/TopTen.twig', $data);
    }
}