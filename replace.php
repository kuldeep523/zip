<?php
$file = 'resources/views/livewire/storefront/gemstones-detailpage.blade.php';
$content = file_get_contents($file);

// Replace static category name with dynamic
$content = str_replace('Blue Star  Stone', '{{ $currentCategory->name ?? \'Gemstone\' }}', $content);
$content = str_replace('Blue Star', '{{ $currentCategory->name ?? \'Gemstone\' }}', $content);
$content = str_replace('Manik Stone', '{{ $currentCategory->name ?? \'Gemstone\' }}', $content);
$content = str_replace('Manik', '{{ $currentCategory->name ?? \'Gemstone\' }}', $content);

// Remove the dummy products array block
$content = preg_replace('/@php\s+\$products = \[.*?\];\s+@endphp/s', '', $content);

// Update product array access to object access
$content = str_replace("\$product['name']", "\$product->name", $content);
$content = str_replace("\$product['carat']", "\$product->weight", $content);
$content = str_replace("\$product['sku']", "\$product->sku ?? 'N/A'", $content);
$content = str_replace("\$product['origin']", "\$product->origin ?? 'N/A'", $content);
$content = str_replace("\$product['sale_price']", "\$product->price", $content);

// The featured image replacement is a bit tricky because the original syntax is inside the src tag:
// <img src="{{ $product['featured_image'] }}"
$content = str_replace("{{ \$product['featured_image'] }}", "{{ \$product->primaryImage() ? asset('storage/' . \$product->primaryImage()->path) : asset('images/placeholder.jpg') }}", $content);


file_put_contents($file, $content);
echo 'Replaced successfully!';
