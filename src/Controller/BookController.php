<?php


namespace App\Controller;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function create(EntityManagerInterface $entityManager)
    {
        $book = new Book();
        $book->setName('name');
        $book->setYearEdition(1982);
        $book->setIsbn(1234567890123);
        $book->setPageCount(123);
        $book->setCoverImg('link');

        $entityManager->persist($book);
        $entityManager->beginTransaction();
        try {
            $entityManager->flush();
            $entityManager->commit();
            $result = new Response('Добавлена новая книга '.$book->getName());
        } catch (\Throwable $throwable) {
            $entityManager->rollback();
            $result = new Response('Добавить книгу не удалось');
        }

        return $result;
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
        $book = Book::class;

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