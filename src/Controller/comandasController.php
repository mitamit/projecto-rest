<?php
/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 25/04/2018
 * Time: 23:51
 */


namespace App\Controller;

use App\Entity\Comanda;
use App\Entity\Producto;
use App\Form\ComandaType;

use App\Form\ProductoType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class comandasController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/comandas", name="app_comanda")
     */
    public function crearComanda(Request $request, EntityManagerInterface $em)
    {

       $produ = new Producto();
       $produ2 = new Producto();
       $produ2->setNombre('Cocacola');
       $produ->setTipo(1);
       $produ->setPrecio(6.45);
       $produ->setDescripcion('Pizza Margarita');
       $produ2->setTipo(3);
        $produ2->setPrecio(1.65);
        $produ2->setDescripcion('lata 33cl');
       $produ->setNombre('Pizza');
       $coman = new Comanda($produ);
       $coman->addProducto($produ2);
       $coman->addProducto($produ);
       $coman->setCamarero('Andres');
       $coman->setCamarero('Francisco');
       $coman->setMesa(1);
       $coman->setEstado('pendiente');
       $a = $coman->calculaCuenta();

       //$em->persist($coman);
       //$em->flush();


       return $this->render('crearComanda.html.twig', ['com'=> $a]);

    }






}
