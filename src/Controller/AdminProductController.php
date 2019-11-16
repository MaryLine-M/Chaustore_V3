<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Repository\BrandRepository;


class AdminProductController extends AbstractController
{
   /**
    * @var ProductRepository
    */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }



    /**
     * @Route("/admin/product", name="admin_product")
     */
    public function shoes()
    {
        $products = $this->repository->findAll();
        return $this->render('admin_product/shoes.html.twig', [
            'products' => $products,
        ]);
    }

}
