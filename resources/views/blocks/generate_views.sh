#!/bin/bash

# List of module names
modules=("hero" "heropage" "collection" "content" "entries" "headline" "headlineandtext" "image" "images" "list" "related")

# Loop through the module names and create Blade template files
for module in "${modules[@]}"; do
    # Define the file path
    filename="${module}.blade.php"

    # Add the Blade template content
    cat <<EOF > $filename
<section data-block-name="${module}">
    <div class="container py-32">
        <h2 class="text-center">
            block:${module}
        </h2>
    </div>
</section>
EOF

    echo "Created file: $filename"
done
