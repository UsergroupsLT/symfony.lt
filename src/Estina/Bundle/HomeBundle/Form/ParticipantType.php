<?php

namespace Estina\Bundle\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ParticipantType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('participant', 'text', ['attr' => [
                'placeholder' => 'Vardas, pavardė'
            ]])
            ->add('email', 'email', ['attr' => [
                'placeholder' => 'El. paštas'
            ]])
            ->add('phone', 'text', ['attr' => [
                'placeholder' => 'Telefono nr.'
            ]])
            ->add('age', 'text', ['attr' => [
                'placeholder' => 'Amžius'
            ]])
            ->add('description', 'text', ['attr' => [
                'placeholder' => 'Patirtis su PHP'
            ]])
            ->add('motivation', 'text', ['attr' => [
                'placeholder' => 'Kodėl nori dalyvauti?'
            ]])
            ->add('wishes', 'text', ['attr' => [
                'placeholder' => 'Ką norėtum išmokti?'
            ]])
        ;
    }
 
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Estina\Bundle\HomeBundle\Entity\Participant'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estina_bundle_homebundle_participant';
    }
}
