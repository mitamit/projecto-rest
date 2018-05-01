<?php
/**
 * Created by PhpStorm.
 * User: JuanMa
 * Date: 25/04/2018
 * Time: 18:07
 */
namespace App\Form;
use App\Entity\Comanda;
use App\Entity\Producto;
use App\Repository\ProductoRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class ComandaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mesa', IntegerType::class, array('label'=> 'Num. Mesa:', 'error_bubbling'=>true))
            ->add('camarero', TextType::class, array('label'=>'Camarero: ', 'error_bubbling'=>true))
            ->add('estado', TextType::class,  array('label'=>'Estado de la comanda: ', 'error_bubbling'=>true))
                ->add('id', EntityType::class, array('label'=>'Hamburguesas', 'error_bubbling'=>true,
                    'class' => Producto::class,
                    'query_builder' => function(ProductoRepository $repo) {
                        return $repo->findAllByTipo(1);},
                    'choice_label' =>'nombre',))
            ->add('save', submitType::class, array('label'=>'Añadir'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Comanda::class,
        ));
    }


}