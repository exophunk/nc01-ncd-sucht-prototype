<?php
/**
 * RelevanceScore module for Craft CMS 3.x
 *
 * Calculates a relevance score for all elements to sort search results
 *
 * @link      robertkrieg.ch
 * @copyright Copyright (c) 2020 Robert Krieg
 */

namespace modules\relevancescoremodule;


use Craft;
use craft\console\Application as ConsoleApplication;

use yii\base\Module;

/**
 * Class RelevanceScoreModule
 *
 * @author    Robert Krieg
 * @package   RelevanceScoreModule
 * @since     1.0.0
 *
 */
class RelevanceScoreModule extends Module
{

    public function __construct($id, $parent = null, array $config = [])
    {
        Craft::setAlias('@modules/relevancescoremodule', $this->getBasePath());
        $this->controllerNamespace = 'modules\relevancescoremodule\controllers';
        parent::__construct($id, $parent, $config);
    }

    public function init()
    {
        parent::init();

        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'modules\relevancescoremodule\console\controllers';
        }
    }
}
