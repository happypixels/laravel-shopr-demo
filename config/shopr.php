<?php

return [
    /**
     * View templates for the necessary default views.
     */
    'templates' => [
        'cart'               => 'shop.cart',
        'checkout'           => 'shop.checkout',
        'order-confirmation' => 'shop.order-confirmed',
    ],

    /**
     * The default currency. This will affect all money formatting.
     */
    'currency' => 'USD',

    /**
     * The tax percentage.
     */
    'tax' => 20,

    /**
     * Email addresses to the administrators. These will receive the
     * emails defined in the 'emails.admins' key below.
     */
    'admin_emails' => ['info@happypixels.se'],

    /**
     * Here you may define your own email views in order to fully customize their appearances.
     * Each email has access to the full Order model.
     *
     * Set options to 'null' to use default template or subject.
     * Set enabled to 'false' to disable the email.
     */
    'mail' => [
        'customer' => [
            'order_placed' => ['enabled' => true, 'template' => null, 'subject' => null],
        ],
        'admins' => [
            'order_placed' => ['enabled' => true, 'template' => null, 'subject' => null],
        ],
    ],

    /**
     * The available payment gateways.
     */
    'gateways' => [
        'stripe' => [
            'publishable_key' => env('STRIPE_PUBLISHABLE_KEY', ''),
            'api_key'         => env('STRIPE_SECRET_KEY', '')
        ]
    ]
];
