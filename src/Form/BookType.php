<?php

namespace App\Form;


use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;


class BookType extends AbstractType
{
    private $userRepository;
    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('isbn')
            ->add('editorial')
            ->add('publishYear')
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'choices' => $this->authorRepository->findAllNameAlphabetical(),
            ])
            // ->add('author', AuthorRepository::class)
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
