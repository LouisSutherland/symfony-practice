<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\File;
use App\Entity\Pdf;
use App\Entity\Video;
use App\Repository\AuthorRepository;
use App\Repository\FileRepository;
use App\Repository\PdfRepository;
use App\Repository\VideoRepository;
use Symfony\Component\Routing\Annotation\Route;

class DoctrineInheritanceMappingAndPolymorphism extends AbstractController
{
    /** @Route("/inheritance-mapping", name="inheritance-mapping") */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

//        // Normal Query
//        /** @var PdfRepository $pdfRepo */
//        $pdfRepo = $em->getRepository(Pdf::class);
//        $pdfs = $pdfRepo->findAll();
//        dump($pdfs);
//
//        // Normal query
//        /** @var VideoRepository $videoRepo */
//        $videoRepo = $em->getRepository(Video::class);
//        $videos = $videoRepo->findAll();
//        dump($videos);
//
//        // Polymorphic query
//        /** @var FileRepository $fileRepo */
//        $fileRepo = $this->getDoctrine()->getRepository(File::class);
//        $files = $fileRepo->findAll();
//        dump($files);

        /** @var AuthorRepository $authorRepo */
        $authorAndPdfs = $em->getRepository(Author::class)->findByIdWithPdfs(1);
        dump($authorAndPdfs);
//
//        /** @var File $file */
//        foreach($author->getFiles() as $file){
//
//            if($file instanceof Pdf){
//                dump($file->getFilename());
//            }
//
//        }



        return $this->render('blank.twig');
    }
}