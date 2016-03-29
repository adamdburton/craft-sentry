<?php
namespace Craft;

class SentryService extends BaseApplicationComponent
{
    /**
     * The Sentry plugin instance.
     *
     * @var \Craft\SentryPlugin
     */
    protected $plugin;

    /**
     * Sentry's settings.
     *
     * @var array
     */
    protected $settings;

    /**
     * Get Sentry's settings.
     *
     * @return void
     */
    public function __construct()
    {
        $this->plugin = craft()->plugins->getPlugin('sentry');
        $this->settings = $this->plugin->getSettings();
    }

    /**
     * Returns Sentry DSN.
     *
     * @return string
     */
    public function dsn()
    {
        if ($dsn = craft()->config->get('sentryDsn', 'sentry')) {
            return $dsn;
        }
        return $this->settings->getAttribute('dsn');
    }

    /**
     * True if the Sentry DSN is specified by the environment (.env or whatever)
     * @return boolean
     */
    public function isDsnSpecifiedByEnv()
    {
        return craft()->config->get('sentryDsn', 'sentry') ? true : false;
    }

    /**
     * Returns Sentry public DSN.
     *
     * @return string
     */
    public function publicDsn()
    {
        if ($publicDsn = craft()->config->get('sentryPublicDsn', 'sentry')) {
            return $publicDsn;
        }
        return $this->settings->getAttribute('publicDsn');
    }
    
    /**
     * True if the Sentry public DSN is specified by the environment (.env or whatever)
     * @return boolean
     */
    public function isPublicDsnSpecifiedByEnv()
    {
        return craft()->config->get('sentryPublicDsn', 'sentry') ? true : false;
    }

}
