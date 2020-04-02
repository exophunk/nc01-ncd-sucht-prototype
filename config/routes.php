<?php
/**
 * Site URL Rules
 *
 * You can define custom site URL rules here, which Craft will check in addition
 * to any routes you’ve defined in Settings → Routes.
 *
 * See http://www.yiiframework.com/doc-2.0/guide-runtime-routing.html for more
 * info about URL rules.
 *
 * In addition to Yii’s supported syntaxes, Craft supports a shortcut syntax for
 * defining template routes:
 *
 *     'blog/archive/<year:\d{4}>' => ['template' => 'blog/_archive'],
 *
 * That example would match URIs such as `/blog/archive/2012`, and pass the
 * request along to the `blog/_archive` template, providing it a `year` variable
 * set to the value `2012`.
 */

return [
    '' => ['template' => 'pages/index'],
    

    // Algolia Frontend Search
    'algolia/algolia-vue-instant-search' => ['template' => 'pages/algolia/algolia-vue-instant-search'],
    'algolia/algolia-vanilla-search' => ['template' => 'pages/algolia/algolia-vanilla-search'],

    // Result Pages
    '/results/<entryType:.*>' => ['template' => 'pages/results/_index'],
    '/results/' => ['template' => 'pages/results/_index'],

    'tagbar' => ['template' => 'pages/tagbar/index'],
];
