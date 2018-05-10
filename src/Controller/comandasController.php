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
use Doctrine\ORM\Query\AST\OrderByItem;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class comandasController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/comandas", name="app_form_comanda")
     */
    public function crearAccion()
    {
        $action = $this->generateUrl('app_comanda_creando');
        $comanda = new Comanda();
        $form = $this->createForm(ComandaType::class, $comanda);
        return $this->render('crearcomanda.html.twig',
            ['action' => $action,
                'form' => $form->createView()]
        );
    }
    /**
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/comandas/crear", name="app_comanda_creando")
     */
    public function hacerCrearAccion(EntityManagerInterface $em, Request $request)
    {
        $comanda = new Comanda();
        $formulario = $this->createForm(ComandaType::class, $comanda);
        $formulario->handleRequest($request);
        $prod1 = $comanda->getProd1();
        $prod2 = $comanda->getProd2();
        $prod3 = $comanda->getProd3();
        $comanda->addProducto($prod1);
        $comanda->addProducto($prod2);
        $comanda->addProducto($prod3);
        if ($formulario->isValid()) {
            $em->persist($comanda);
            $em->flush();
            return $this->redirectToRoute('app_camarero');
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *  @Route(path="/comandas/lista", name="app_listar_comanda")
     */

    public function actionListar(EntityManagerInterface $em)
    {
        //$em = $this->getDoctrine()->getManager(); es lo mismo que entitymanagerInterface $em
        $comandaRepo=$em->getRepository(Comanda::class);
        $comanda=$comandaRepo->findAll();
        return $this->render('listaComandas.html.twig', ['comandas'=>$comanda]);
    }

}
