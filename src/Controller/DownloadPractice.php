<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;

class DownloadPractice extends AbstractController
{
    /**
     * @return BinaryFileResponse
     * @Route("/download-practice", name="download-practice")
     */
    public function index(): BinaryFileResponse
    {
        $path = $this->getParameter('download_directory');
        return $this->file($path . 'file.pdf');
    }
}