<?php

namespace Craft;

/**
 * Sentry Variable.
 *
 * Lets you use Sentry in templates
 *
 * @author    Bob Olde Hampsink <b.oldehampsink@itmundi.nl>
 * @author    Adam Burton <adam@burt0n.net>
 * @copyright Copyright (c) 2015, Bob Olde Hampsink
 * @license   http://buildwithcraft.com/license Craft License Agreement
 *
 * @link      http://github.com/adamdburton/craft-sentry
 */
class SentryVariable
{
    /**
     * Settings.
     *
     * @var object
     */
    private $_settings;

    /**
     * Constructor.
     *
     * Gets plugin settings for internal use.
     */
    public function __construct()
    {
        $this->_settings = craft()->plugins->getPlugin('sentry')->getSettings();
    }

    /**
     * Returns Sentry DSN.
     *
     * @return string
     */
    public function dsn()
    {
        return craft()->sentry->dsn();
    }

    /**
     * True if the Sentry DSN is specified by the environment (.env or whatever)
     * @return boolean
     */
    public function isDsnSpecifiedByEnv()
    {
        return craft()->sentry->isDsnSpecifiedByEnv();
    }

    /**
     * Returns Sentry public DSN.
     *
     * @return string
     */
    public function publicDsn()
    {
        return craft()->sentry->publicDsn();
    }
    
    /**
     * True if the Sentry public DSN is specified by the environment (.env or whatever)
     * @return boolean
     */
    public function isPublicDsnSpecifiedByEnv()
    {
        return craft()->sentry->isPublicDsnSpecifiedByEnv();
    }

    /**
     * Returns Reporting in devMode.
     *
     * @return string
     */
    public function reportInDevMode()
    {
        return $this->_settings->getAttribute('reportInDevMode');
    }

}
