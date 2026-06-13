<?php

namespace App\Services\Ai;

class AiContentGeneratorService
{
    /**
     * Generates product description. Configure OPENAI_API_KEY in .env for live AI.
     */
    public function generateProductDescription(string $name, ?string $shortDescription = null): string
    {
        $intro = $shortDescription ? "{$shortDescription}\n\n" : '';

        return $intro."Discover the premium quality of {$name}. "
            .'Hand-selected for authenticity, certified quality, and exceptional value. '
            .'Ideal for collectors and those seeking trusted gemstone jewelry from RR Gems Udaipur.';
    }

    public function generateSeoMeta(string $title, ?string $content = null): array
    {
        $description = substr(strip_tags($content ?? $title), 0, 155);

        return [
            'meta_title' => "{$title} | Buy Online | RR Gems Udaipur",
            'meta_description' => $description ?: "Shop {$title} at RR Gems Udaipur. Certified gemstones & fine jewelry.",
            'meta_keywords' => implode(', ', array_filter([
                strtolower($title),
                'gemstones',
                'udaipur',
                'rr gems',
                'certified',
            ])),
        ];
    }
}
