<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ResponsiveMedia extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $responsiveMedia = new FieldsBuilder('responsive_media');

        $responsiveMedia
        ->addGroup('responsivemediagroup', [
            'label' => 'Media',
        ])
            ->addMessage('imagenotes', 'message', [
                'label' => 'Media notes',
                'message' => 'The images upload should be of a high quality and be atleast 2000px wide. JPEG are the preferred format. The system will scale them down automatically for the different use cases.',
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
                ->addImage('desktopimage', [
                    'label' => 'Desktop Image',
                    'instructions' => 'When "Ambient video" or "Video" is selected this image will be used as a the poster before the video plays or loads. Hero (2000 x 1095)',
                ])
                ->addImage('mobileimage', [
                    'label' => 'Mobile Image',
                    'instructions' => 'When "Ambient video" or "Video" is selected this image will be used as a the poster before the video plays or loads. Format: Portrait ( 2000 x 2600 )',
                ])
                ->addText('desktopambientvideo', [
                    'label' => 'Desktop Ambient video url',
                    'instructions' => 'Add the video URL from Vimeo ( use: HD 1080p ). The links can be found on the vimeo page under ··· and "Video file links" in the dropdown menu. Format: Hero (2000 x 1095',
                ])
                ->conditional('mediatype', '==', 'ambientvideo')
                ->addText('mobileambientvideo', [
                    'label' => 'Mobile Ambient video url',
                    'instructions' => 'Add the video URL from Vimeo ( use: HD 720p ). Format: Portrait ( 2000 x 2600 )',
                ])
                ->conditional('mediatype', '==', 'ambientvideo')
                ->addText('videoid', [
                    'label' => 'Vimeo video id',
                    'instructions' => 'If you provide and id a PLAY button will display on the image and open a videoplayer when you click it. <br />The id can be found in the url on vimeo. It looks something like this: 405353889',
                ])
            ->endGroup();

        return $responsiveMedia;
    }
}
