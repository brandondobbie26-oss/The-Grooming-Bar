<?php
/**
 * Image Configuration Map
 * Maps Pages -> Sections -> Images (Array of filenames)
 */

return [
    'Home Page' => [
        'Hero Section' => [
            'colley.jpeg', 
            'nail.jpeg', 
            'kid.jpeg',
            'nails.jpeg',
            'small.jpeg', 
            'nail2.jpeg'
        ],
        'Promotional / Offers' => [
            'fade3.jpeg' // Often used in promo cards
        ]
    ],
    'About Us' => [
        'Hero Banner' => [
            'colley.jpeg' // Used in Hero
        ],
        'Our Story' => [
            'colley.jpeg' // Also used in the story section (large)
        ]
    ],
    'Services & Projects' => [
        'Service Page Headers' => [
            'fade3.jpeg', // Haircuts Header
            'beard.jpeg', // Beard Header (if exists, or fallback)
            'nail.jpeg'   // Nails Header
        ],
        'Gallery / Projects' => [
            'tgb_shop.jpg',
            'tgb_fade.jpg',
            'tgb_client.jpg',
            'kid.jpeg',
            'fade3.jpeg'
            // 'colley.jpeg' was removed/replaced by video in projects, but the file remains on disk
        ]
    ],
    'General / Global' => [
        'Site Logo' => [
            'logo.jpeg'
        ],
        'Shared Assets' => [
            'new product.jpeg'
        ]
    ]
];
?>
