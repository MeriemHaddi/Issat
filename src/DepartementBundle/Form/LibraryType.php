<?php

namespace DepartementBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LibraryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
            ->add('subject', ChoiceType::class, array(
            'choices'  => array(
                'Computer Science' => "Computer Science",
                'Mathematics' => "Mathematics",
                'Software' => "Software",
                'Other' => "Other",
            ),
        ))
            ->add('type', ChoiceType::class, array(
                'choices'  => array(

                    'Book' => "Book ",
                    'CD' => "CD",
                    'Article' => "Article",
                    'Other' => "Other",
                ),
            ))
            ->add('year')
            ->add('status', ChoiceType::class, array(
                'choices'  => array(
                    'In stock' => "In Stock",
                    'Out Of Stock' => "Out Of Stock",

                ),
            ))
            ->add('autherName')
            ->add('publisher')
            ->add('assetDetails')
            ->add('departement', EntityType::class, array(
                'class' => 'DepartementBundle\Entity\Departement',
                'choice_label' => 'name',
                'choice_value' => 'name',
            ))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DepartementBundle\Entity\Library'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'departementbundle_library';
    }


}
