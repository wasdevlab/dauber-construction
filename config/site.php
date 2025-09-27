<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration options for site-wide settings such as
    | social media links, contact information, and other business details.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Social Media Links
    |--------------------------------------------------------------------------
    */
    'social' => [
        'facebook' => env('SOCIAL_FACEBOOK', 'https://facebook.com/DauberAndPartnersConstruction'),
        'instagram' => env('SOCIAL_INSTAGRAM', 'https://instagram.com/DauberAndPartnersConstruction'),
        'linkedin' => env('SOCIAL_LINKEDIN', 'https://linkedin.com/company/DauberAndPartnersConstruction'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Contact Information
    |--------------------------------------------------------------------------
    */
    'contact' => [
        'email' => env('CONTACT_EMAIL', 'support@dauberandpartnersconstruction.com'),
        'phone' => env('CONTACT_PHONE', '(555) 123-4567'),
        'address' => [
            'street' => env('CONTACT_ADDRESS_STREET', '123 Construction Lane'),
            'city' => env('CONTACT_ADDRESS_CITY', 'Demo City'),
            'state' => env('CONTACT_ADDRESS_STATE', 'DC'),
            'zip' => env('CONTACT_ADDRESS_ZIP', '12345'),
        ],
        'full_address' => env('CONTACT_FULL_ADDRESS', '123 Construction Lane, Demo City, DC 12345'),
    ],

];