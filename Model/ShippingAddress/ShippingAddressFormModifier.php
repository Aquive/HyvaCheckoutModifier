<?php

namespace AquiveMedia\CheckoutModifier\Model\ShippingAddress;

use Hyva\Checkout\Model\Form\EntityFormInterface;
use Hyva\Checkout\Model\Form\EntityFormModifierInterface;

/**
 * Class ShippingAddressFormModifier
 * @package AquiveMedia\CheckoutModifier\ShippingAddress
 * @author Akif Gumussu <info@aquive.nl>
 */
class ShippingAddressFormModifier implements EntityFormModifierInterface {

    /**
     * @param EntityFormInterface $form
     * @return EntityFormInterface
     */
    public function apply(EntityFormInterface $form): EntityFormInterface
    {
        $form->registerModificationListener(
            'myCallbackIdentifier',         // the callback identifier
            'form:build',                   // the modification name
            [$this, 'applyAddLabel']        // the callback
        );

        return $form;
    }

    /**
     * @param EntityFormInterface $form
     * @return void
     */
    public function applyAddLabel(EntityFormInterface $form): void
    {
        $field = $form->getField('company');
        $field?->setLabel($field->getLabel() . ' (' . __('Not required') . ')');
    }
}
