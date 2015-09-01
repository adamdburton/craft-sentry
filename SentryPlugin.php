<?php

namespace Craft;

use Raven_Client;

/**
 * Sentry Plugin.
 *
 * Integrates Rollbar into Craft
 *
 * @author    Bob Olde Hampsink <b.oldehampsink@itmundi.nl>
 * @author    Adam Burton <adam@burt0n.net>
 * @copyright Copyright (c) 2015, Bob Olde Hampsink
 * @license   http://buildwithcraft.com/license Craft License Agreement
 *
 * @link      http://github.com/adamdburton/craft-sentry
 */
class SentryPlugin extends BasePlugin
{
    /**
     * Get plugin name.
     *
     * @return string
     */
    public function getName()
    {
        return Craft::t('Sentry');
    }

    /**
     * Get plugin version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * Get plugin developer.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Adam Burton / Bob Olde Hampsink';
    }

    /**
     * Get plugin developer url.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://github.com/adamdburton';
    }

    /**
     * Define plugin settings.
     *
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'dsn' => AttributeType::String,
            'reportInDevMode' => AttributeType::Bool
        );
    }

    /**
     * Get settings template.
     *
     * @return string
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render('sentry/_settings', array(
           'settings' => $this->getSettings(),
        ));
    }

    /**
     * Initialize Sentry.
     */
    public function init()
    {
        // Get plugin settings
        $settings = $this->getSettings();

        // See if we have to report in devMode
        if (!$settings->reportInDevMode && craft()->config->get('devMode')) {
            return;
        }

        // Require Sentry vendor code
        require_once CRAFT_PLUGINS_PATH.'sentry/vendor/autoload.php';

        // Initialize Sentry
        $client = new Raven_Client($settings->dsn);
        $client->tags_context(array('environment' => CRAFT_ENVIRONMENT));

        // Log Craft Exceptions to Sentry
        craft()->onException = function ($event) use ($client) {
            $client->captureException($event->exception);
        };

        // Log Craft Errors to Sentry
        craft()->onError = function ($event) use ($client) {
            $client->captureMessage($event->message);
        };
    }
}
