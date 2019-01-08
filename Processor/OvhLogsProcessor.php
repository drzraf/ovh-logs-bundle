<?php

namespace Chaplean\Bundle\OvhLogsBundle\Processor;

/**
 * Class OvhLogsProcessor.
 *
 * @package   Chaplean\Bundle\OvhLogsBundle\Processor
 * @author    Matthias - Chaplean <matthias@chaplean.coop>
 * @copyright 2014 - 2018 Chaplean (http://www.chaplean.coop)
 * @version   1.0.0
 */
class OvhLogsProcessor
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var string|null
     */
    protected $env;

    /**
     * OvhLogProcessor constructor.
     *
     * @param string      $token
     * @param string|null $env
     */
    public function __construct(string $token, string $env = null)
    {
        $this->token = $token;
        $this->env = $env;
    }

    /**
     * @param array $record
     *
     * @return array
     */
    public function processRecord(array $record)
    {
        $record['extra']['X-OVH-TOKEN'] = $this->token;

        if ($this->env !== null) {
            $record['extra']['env'] = $this->env;
        }

        return $record;
    }
}
