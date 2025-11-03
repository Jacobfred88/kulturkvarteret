<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;
use App\Fields\Partials\Media;

class Post extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $posts = Builder::make('posts', [
            'title' => 'Post info',
            'hide_on_screen' => [
                0 => 'the_content'
            ]
        ]);

        $posts
            ->setLocation('post_type', '==', 'post');

        $posts

            ->addFields($this->get(Media::class))
                ->modifyField('mediagroup', ['label' => 'Cover', 'instructions' => 'Used on archive pages. Format: 2000x1205px ( JPG )'])
            ->addGroup('pageinfo')
                ->addFields($this->get(Media::class))
                ->modifyField('mediagroup', ['label' => 'Page cover', 'instructions' => 'Used on the subpage. Format: 2000x2266px ( JPG )'])
            ->endGroup()
            ->addTextArea('headline', [
                'label' => 'Headline',
                'rows' => 3,
            ])
            ->addWysiwyg('intro', [
                'label' => 'Intro',
                'toolbar' => 'basic',
            ])
            ->addFlexibleContent('layout_blocks',[
                'button_label' => 'Add layout',
                'label' => 'Blocks',
                'instructions' => 'You can add as any content blocks as you like!',
            ])
                ->addLayout(require  __DIR__ . '../../blocks/ReusableBlock.php',[
                    'label' => '⚙️ Reusable'
                ])
            ->endFlexibleContent();

        return $posts->build();
    }
}
