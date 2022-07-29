<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\Gifts;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /** @Route("/", "home") */
    public function index(Gifts $gifts)
    {
        /** @var UserRepository $userRepo */
        $userRepo = $this->getDoctrine()->getRepository(User::class);

        $data['users'] = $userRepo->findAll();
        $data['controller_name'] = 'sdfsd';
        $data['gifts'] = $gifts->getGifts();


        return $this->render('default/index.html.twig', $data);
    }

    /** @Route("/default2", "default2") */
    public function default2()
    {
        return new Response("<html>DEFAULT 2. Your name is</html>");
    }

    /** @Route("/create-user/{name}", name="create-user") */
    public function createUser($name)
    {
        $this->createNewUser($name);
        return $this->redirectToRoute('home');

    }

    private function createNewUser($name)
    {
        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setName($name);
        $em->persist($user);
        $em->flush();
    }

    // BLOG ROUTE

    /** @Route("/blog/{page?}", name="blog", requirements={"page"="\d+"}) */
    public function index2(){
        return new Response('This is a new response');
    }

    // Advanced route

    /**
     * @Route(
     *     "/articles/{_locale}/{year}/{category}",
     *     defaults={"category": "computers"},
     *     requirements={
     *          "_locale": "en|fr",
     *          "category": "computers|rtv",
     *          "year": "\d+"
     *     }
     *
     * )
     */
    public function index3($_locale, $year, $category)
    {
        return new Response("Your searched for $_locale in the year $year in the category $category");
    }

}
