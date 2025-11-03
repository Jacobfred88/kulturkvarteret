<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;
class Options extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */

    public $name = 'Options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Options';


    public $capability = 'edit_posts';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $options = new FieldsBuilder('options');

        $options
            ->addTab('footertab', [
                'label' => 'Footer'
            ])
            ->addTextArea('address', [
                'label' => 'Address'
            ])
            ->addText('phone', [
                'label' => 'Phone'
            ])
            ->addText('email', [
                'label' => 'Email'
            ])

            ->addRepeater('socials', [
                'label' => 'Socials'
            ])
                ->addLink('social')
            ->endRepeater();

        return $options->build();
    }
}
