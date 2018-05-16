<?php
/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 16/05/2018
 * Time: 11:17
 */

namespace App\Controller;


use App\Entity\Mesa;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Cuenta extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/cuenta", name="app_cuenta")
     */
    public function mostrarMesas()
    {
        return $this->render('mesascuenta.html.twig');
    }
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route(path="/cuenta/mesa{numeromesa}", name="app_cuenta_mesa")
     */
    public function calcularCuenta(EntityManagerInterface $em, $numeromesa)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository(Mesa::class);
        $mesa = $repository->find($numeromesa);
        $comandas = $mesa->getComandas();
        $cuentatotal = $mesa->calculaPrecio();
        return $this->render('cuenta.html.twig',
            ['comandas' => $comandas,
                'cuentatotal' => $cuentatotal]);
    }

}