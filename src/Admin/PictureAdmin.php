<?php


namespace App\Admin;

use App\Entity\Folder;
use App\Entity\Picture;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class PictureAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('name')
            ->add('volume')
            ->add('folder', null, [EntityType::class], ['class' => Folder::class, 'choice_label' => 'name'])
            ->add('createdAt');
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
        $datagridMapper->add('volume');
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);
        $formMapper->add('volume', TextType::class);
        $formMapper->add('folder', ModelType::class, ['class' => Folder::class, 'property' => 'name']);
        $formMapper->add('picture', FileType::class, ['label' => 'picture', 'mapped' => false, 'required' => false,
            'constraints' => [new File([
                'maxSize' => '1024k',
                'mimeTypes' => [
                    'image/jpeg',
                    'image/png',
                    'image/gif'
                ],
                'mimeTypesMessage' => 'Please upload a valid picture',
            ])
            ]
        ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}