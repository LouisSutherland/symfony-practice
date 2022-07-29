<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;

class Downloads extends AbstractController
{
    /**
     * @return BinaryFileResponse
     * @Route("/download-file", name="download-file")
     */
    public function downloads(): BinaryFileResponse
    {
        $path = $this->getParameter('download_directory');
        return $this->file($path . 'file.pdf');
    }
}