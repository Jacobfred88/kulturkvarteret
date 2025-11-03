#!/bin/bash

# Target folder for the module files


# Create the folder if it doesn't exist


# List of module names
modules=("contact" "content" "entry" "gallery" "headline-text" "hero" "hero-image" "hero-split" "image" "images" "jobs" "lastest" "news" "people" "player" "projects" "publications" "quote" "related" "selected-projects" "services" "text-image")

# Loop through the module names and create PHP files
for module in "${modules[@]}"; do
    # Convert dashes to camelCase for the PHP class name
    module_class=$(echo "$module" | awk -F'-' '{for (i=1; i<=NF; i++) $i=toupper(substr($i,1,1)) substr($i,2)} 1' OFS='')

    # Define the file path with "Block" suffix
    filename="${module_class}Block.php"

    # Add the PHP module template content
    cat <<EOF > $filename
<?php

namespace App;
use StoutLogic\AcfBuilder\FieldsBuilder;

\$module = new FieldsBuilder('${module}');

// \$module
//     ->addTextArea('headline', [
//         'label' => 'Headline',
//         'new_lines' => 'br'
//     ])

return \$module;
EOF

    echo "Created file: $filename"
done
