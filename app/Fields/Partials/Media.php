<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Media extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $media = new FieldsBuilder('media');

        $media
        ->addGroup('mediagroup', [
            'label' => 'Media',
        ])
            ->addRadio('mediatype', [
                'label' => 'Media type',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'choices' => [
                    'image' => 'Image',
                    'ambientvideo' => 'Ambient video',
                ],
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'image',
                'layout' => 'vertical',
                'return_format' => 'value',
            ])
                ->addImage('image', [
                    'label' => 'Image',
                    'instructions' => 'When "Ambient video" or "Video" is selected this image will be used as a the poster before the video plays or loads',
                ])
                ->addText('ambientvideo', [
                    'label' => 'Ambient video url',
                    'instructions' => 'Add the video URL from Vimeo ( use: HD 1080p ). The links can be found on the vimeo page under ··· and "Video file links" in the dropdown menu.',
                ])
                ->conditional('mediatype', '==', 'ambientvideo')
            ->endGroup();

        return $media;
    }
}
