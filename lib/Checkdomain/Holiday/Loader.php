<?php

namespace Checkdomain\Holiday;

/**
 * Class Loader
 */
class Loader
{
    /**
     * Namespace to default holiday providers
     */
    const PROVIDER_NAMESPACE = '\\Checkdomain\\Holiday\\Provider\\';


    /**
     * Additional providers apart provider namespace
     *
     * @var array
     */
    protected $additionalProviders = array();

    /**
     * Provider instances
     *
     * @var array
     */
    protected $providerInstances = array();

    /**
     * Adds or replace provider
     *
     * @param string $iso
     * @param string $provider
     *
     * @return Util
     */
    public function setProvider($iso, $provider)
    {
        unset($this->providerInstances[$iso]);

        $this->additionalProviders[$iso] = $provider;

        return $this;
    }

    /**
     * Instantiates a provider for a given iso code
     *
     * @param string $iso
     *
     * @return ProviderInterface
     */
    public function getProvider($iso)
    {
        $iso      = strtoupper($iso);
        $instance = null;

        if (false === isset($this->providerInstances[$iso])) {
            if (isset($this->additionalProviders[$iso])) {
                // Additional provider instance
                $instance = new $this->additionalProviders[$iso];
            } else {
                // Default provider instance
                $class = self::PROVIDER_NAMESPACE . $iso;

                if (class_exists($class)) {
                    $instance = new $class;
                }
            }

            if ($instance) {
                $this->providerInstances[$iso] = $instance;
            }
        } else {
            $instance = $this->providerInstances[$iso];
        }

        return $instance;
    }
}
