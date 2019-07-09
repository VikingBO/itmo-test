<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{

    /**
     * @Route("/books", name="Каталог книг")
     */
    public function index()
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    /**
     * @Route('/book/create', name='Создвть книгу')
     */
    public function create()
    {
        return 'test';
    }

    /**
     * @Route(
     *     '/book/{id}',
     *      name="Просмотр книги",
     *     requirements={"id"="\d+"}
     *     )
     */
    public function view($id)
    {
        return $this->render('book/view.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    /**
     * @param $id
     */
    public function edit($id)
    {

    }

    /**
     * @param $id
     */
    public function delete($id)
    {

    }
}