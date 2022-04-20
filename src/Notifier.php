<?php

namespace Wavey\Sweetalert;

class Notifier
{
    /** @var SessionStore */
    protected SessionStore $session;

    /** @var array */
    protected array $config = [];

    /** @var array */
    protected array $buttonConfig = [
        'text'       => '',
        'visible'    => false,
        'value'      => null,
        'className'  => '',
        'closeModal' => true,
    ];

    /**
     * Create a new Notifier instance.
     *
     * @param SessionStore SessionStore $session
     */
    public function __construct(SessionStore $session)
    {
        $this->session = $session;

        $this->setDefaultConfig();
    }

    /**
     * Sets all default config options for an alert.
     *
     * @return void
     */
    protected function setDefaultConfig()
    {
        $this->setConfig([
            'timer'   => config('sweetalert.autoclose'),
            'text'    => '',
            'buttons' => [
                'cancel'  => false,
                'confirm' => false,
            ],
        ]);
    }

    /**
     * Create the basic alert.
     *
     * @param $text
     * @param $title
     *
     * @return $this
     */
    public function basic($text, $title): Notifier
    {
        $this->message($text, $title);

        return $this;
    }

    /**
     * Add the text for the alert.
     *
     * @param string      $text
     * @param string|null $title
     * @param             $icon
     *
     * @return $this
     */
    public function message(string $text = '', string $title = null, $icon = null): Notifier
    {
        $this->config['text'] = $text;

        if (!is_null($title)) {
            $this->config['title'] = $title;
        }

        if (!is_null($icon)) {
            $this->config['icon'] = $icon;
        }
        $this->flashConfig();

        return $this;
    }

    /**
     * Flash the config.
     *
     * @return void
     */
    protected function flashConfig()
    {
        $this->session->remove('sweetalert');

        foreach ($this->config as $key => $value) {
            $this->session->flash("sweetalert.{$key}", $value);
        }

        $this->session->flash('sweetalert.alert', $this->buildJsonConfig());
    }

    /**
     * Encode the config.
     */
    protected function buildJsonConfig()
    {
        return json_encode($this->config);
    }

    /**
     * Get the config.
     *
     * @param $key
     *
     * @return array|mixed|void
     */
    public function getConfig($key = null)
    {
        if (is_null($key)) {
            return $this->config;
        }

        if (array_key_exists($key, $this->config)) {
            return $this->config[$key];
        }
    }

    /**
     * Set the config.
     *
     * @param array $config
     *
     * @return $this
     */
    public function setConfig(array $config = [])
    {
        $this->config = array_merge($this->config, $config);

        return $this;
    }

    /**
     * Get the config in JSON format.
     */
    public function getJsonConfig()
    {
        return $this->buildJsonConfig();
    }

    /**
     * Flash the config.
     */
    public function __destruct()
    {
        $this->flashConfig();
    }

    /**
     * Create the info alert.
     *
     * @param        $text
     * @param string $title
     *
     * @return $this
     */
    public function info($text, string $title = ''): Notifier
    {
        $this->message($text, $title, 'info');

        return $this;
    }

    /**
     * Create the success alert.
     *
     * @param        $text
     * @param string $title
     *
     * @return $this
     */
    public function success($text, string $title = ''): Notifier
    {
        $this->message($text, $title, 'success');

        return $this;
    }

    /**
     * Create the error alert.
     *
     * @param        $text
     * @param string $title
     *
     * @return $this
     */
    public function error($text, string $title = ''): Notifier
    {
        $this->message($text, $title, 'error');

        return $this;
    }

    /**
     * Create the warning alert.
     *
     * @param        $text
     * @param string $title
     *
     * @return $this
     */
    public function warning($text, string $title = ''): Notifier
    {
        $this->message($text, $title, 'warning');

        return $this;
    }

    /**
     * Set the autoclose value in milliseconds.
     *
     * @param $milliseconds
     *
     * @return $this
     */
    public function autoclose($milliseconds = null): Notifier
    {
        if (!is_null($milliseconds)) {
            $this->config['timer'] = $milliseconds;
        }

        return $this;
    }

    /**
     * Create the confirm button.
     *
     * @param string $buttonText
     * @param array  $overrides
     *
     * @return $this
     */
    public function confirmButton(string $buttonText = 'OK', array $overrides = []): Notifier
    {
        $this->addButton('confirm', $buttonText, $overrides);

        return $this;
    }

    /**
     * Add the button.
     *
     * @param       $key
     * @param       $buttonText
     * @param array $overrides
     *
     * @return $this
     */
    public function addButton($key, $buttonText, array $overrides = []): Notifier
    {
        $this->config['buttons'][$key] = array_merge(
            $this->buttonConfig,
            [
                'text'    => $buttonText,
                'visible' => true,
            ],
            $overrides
        );

        $this->closeOnClickOutside(false);
        $this->removeTimer();

        return $this;
    }

    /**
     * Close the button when clicking outside the alert.
     *
     * @param bool $value
     *
     * @return $this
     */
    public function closeOnClickOutside(bool $value = true)
    {
        $this->config['closeOnClickOutside'] = $value;

        return $this;
    }

    /**
     * Remove the timer.
     *
     * @return void
     */
    protected function removeTimer()
    {
        if (array_key_exists('timer', $this->config)) {
            unset($this->config['timer']);
        }
    }

    /**
     * Create the HTML alert.
     */
    public function html()
    {
        $this->config['content'] = $this->config['text'];

        unset($this->config['text']);

        return $this;
    }

    /**
     * Create the persistant alert.
     *
     * @param string $buttonText
     *
     * @return $this
     */
    public function persistent(string $buttonText = 'OK')
    {
        $this->addButton('confirm', $buttonText);
        $this->closeOnClickOutside(false);
        $this->removeTimer();

        return $this;
    }

    /**
     * Create the close button.
     *
     * @param string $buttonText
     * @param array  $overrides
     *
     * @return $this
     */
    public function cancelButton(string $buttonText = 'Cancel', array $overrides = []): Notifier
    {
        $this->addButton('cancel', $buttonText, $overrides);

        return $this;
    }
}
