<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;
use App\Fields\Partials\Media;
use App\Fields\Partials\Theme;

class Page extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $page = Builder::make('page', [
            'title' => 'Page info',
            'hide_on_screen' => [
                0 => 'the_content'
            ]
        ]);

        $page
            ->setLocation('post_type', '==', 'page');

            $page
            ->addFields($this->get(Media::class))
                ->modifyField('mediagroup', ['label' => 'Search image', 'instructions' => 'This image will be used for search results. Format: 2000x1126px ( JPG )']);

        return $page->build();
    }
}
