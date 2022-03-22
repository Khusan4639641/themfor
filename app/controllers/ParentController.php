<?php

namespace App\controllers;
use App\models\Candidates;
use App\models\Middleware;
use App\models\Note;
use App\models\QueryBuilder;
use App\models\Settings;
use App\models\Statistics;
use App\models\Template;
use App\models\Users;
use App\services\Mailer;
use League\Plates\Engine;
use App\models\Install;
use App\models\Message;
use App\models\Forms;

class ParentController
{
    public $form;
    public $view;
    public $builder;
    /**
     * @var Users
     */
    public $users;
    /**
     * @var Install
     */
    public $install;
    /**
     * @var Message
     */
    public $message;
    /**
     * @var Candidates
     */
    public $candidate;
    /**
     * @var Mailer
     */
    public $mailer;
    /**
     * @var Template
     */
    public $template;
    /**
     * @var Note
     */
    public $note;
    /**
     * @var Statistics
     */
    public $statistics;
    /**
     * @var Settings
     */
    public $settings;
    /**
     * @var Middleware
     */
    public $middleware;


    /**
     * ParentController constructor.
     * @param Engine $view
     * @param QueryBuilder $builder
     * @param Users $users
     * @param Message $message
     * @param Forms $form
     * @param Candidates $candidate
     * @param Template $template
     * @param Statistics $statistics
     * @param Settings $settings
     * @param Note $note
     * @param Middleware $middleware
     * @param Mailer $mailer
     */
    public function __construct(Engine $view,
                                QueryBuilder $builder,
                                Users $users,
                                Message $message,
                                Forms $form,
                                Candidates $candidate,
                                Template $template,
                                Statistics $statistics,
                                Settings $settings,
                                Note $note,
                                Middleware $middleware,
                                Mailer $mailer
    ){
            $this->view = $view;
            $this->builder = $builder;
            $this->users = $users;
//        installation DB
            $this->message = $message;

            $this->form = $form;
            $this->candidate = $candidate;
            $this->mailer = $mailer;
            $this->template = $template;
            $this->note = $note;
            $this->statistics = $statistics;
            $this->settings = $settings;
            $this->middleware = $middleware;


    }
}