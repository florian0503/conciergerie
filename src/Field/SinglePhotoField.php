<?php

namespace App\Field;

use App\Form\SinglePhotoType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Symfony\Contracts\Translation\TranslatableInterface;

final class SinglePhotoField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, TranslatableInterface|string|bool|null $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label ?? 'Photo')
            ->setFormType(SinglePhotoType::class)
            ->setTemplatePath('admin/field/single_photo.html.twig');
    }
}
