<?php
/**
 * RelevanceScore module for Craft CMS 3.x
 *
 * Calculates a relevance score for all elements to sort search results
 *
 * @link      robertkrieg.ch
 * @copyright Copyright (c) 2020 Robert Krieg
 */

namespace modules\relevancescoremodule\console\controllers;

use Craft;
use Carbon\Carbon;
use yii\console\Controller;
use yii\helpers\Console;
use craft\elements\Entry;
use twentyfourhoursmedia\viewswork\ViewsWork;
use twentyfourhoursmedia\viewswork\models\ViewRecording;
use doublesecretagency\upvote\Upvote;


/**
 * Default Command
 *
 * @author    Robert Krieg
 * @package   RelevanceScoreModule
 * @since     1.0.0
 */
class ScoreController extends Controller
{

    public function actionUpdateScores()
    {
        $articles = Entry::find()
            ->section('articles')
            ->all();

        foreach($articles as $article) {
            $score = $this->getScore($article);
            $article->setFieldValues([ 'relevanceScore' => $score ]);
            $success =  Craft::$app->elements->saveElement($article);
        }
    }


    private function getScore($element) {
        $recordingRecord = ViewsWork::$plugin->viewsWorkService->getRecordingRecord($element);
        $recording = ViewRecording::createFromRecord($recordingRecord);
        $viewsTotal = $recording->total;
        $likesTotal = Upvote::$plugin->upvote_query->tally($element->id);
        $age = Carbon::now()->diffInDays($element->dateCreated);
        $score = 0;

        switch ($element->rating) {
            case 'top':
                $score += 50;
                break;
            case 'high':
                $score += 25;
                break;
            default:
                break;
        }

        if ($likesTotal >= 10) {
            $score += 50;
        } else if ($likesTotal >= 1) {
            $score += 5;
        }

        if ($age < 1) {
            $score += 50;
        } else if ($age < 2) {
            $score += 40;
        } else if ($age < 3) {
            $score += 30;
        } else if ($age < 4) {
            $score += 20;
        } else if ($age < 7) {
            $score += 15;
        } else if ($age < 10) {
            $score += 10;
        } else if ($age < 14) {
            $score += 5;
        }


        return $score;
    }

}
