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
    

    // ALGOLIA BASED
    'algolia-based/algolia-vue-instant-search' => ['template' => 'pages/algolia-based/search/algolia-vue-instant-search'],
    'algolia-based/algolia-vanilla-search' => ['template' => 'pages/algolia-based/search/algolia-vanilla-search'],
    'algolia-based/results/<type:.*>/<query:.*>' => ['template' => 'pages/algolia-based/resultpages/algolia-result-with-type'],
    'algolia-based/results/<query:.*>' => ['template' => 'pages/algolia-based/resultpages/algolia-result-no-type'],

    // CRAFT NATIVE BASED
    'craft-based/algolia-vue-instant-search' => ['template' => 'pages/craft-based/search/algolia-vue-instant-search'],
    'craft-based/algolia-vanilla-search' => ['template' => 'pages/craft-based/search/algolia-vanilla-search'],
    'craft-based/results/<type:.*>/<query:.*>' => ['template' => 'pages/craft-based/resultpages/craft-result-with-type'],
    'craft-based/results/<query:.*>' => ['template' => 'pages/craft-based/resultpages/craft-result-no-type'],
];
