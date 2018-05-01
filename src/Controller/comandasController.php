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
    public function crearComanda()
    {
        $action=$this->generateUrl('app_comanda_creando');
        $m=$this->getDoctrine()->getManager();
        $proRepo=$m->getRepository(Producto::class);
        $products[]=$proRepo->findAll();

        $comanda=new Comanda($products);
        $form=$this->createForm(ComandaType::class, $comanda);


        return $this->render('crearComanda.html.twig', ['action'=>$action, 'form'=>$form->createView()]);
    }


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/comandas/crear", name="app_comanda_creando")
     */
    public function hacerCrearComanda(EntityManagerInterface $em, Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $proRepo=$em->getRepository(Producto::class);
        $products[]=$proRepo->findAll();
        $comanda = new Comanda($products);
        $formulario = $this->createForm(ProductoType::class, $comanda);
        $formulario->handleRequest($request);
        if ($formulario->isValid()) {
            $em->persist($comanda);
            $em->flush();
            return $this->redirectToRoute('app_comanda');
        }




    }



}
