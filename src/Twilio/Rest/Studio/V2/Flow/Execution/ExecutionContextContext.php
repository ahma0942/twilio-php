<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Studio\V2\Flow\Execution;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class ExecutionContextContext extends InstanceContext {
    /**
     * Initialize the ExecutionContextContext
     *
     * @param Version $version Version that contains the resource
     * @param string $flowSid The flow_sid
     * @param string $executionSid The execution_sid
     */
    public function __construct(Version $version, $flowSid, $executionSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['flowSid' => $flowSid, 'executionSid' => $executionSid, ];

        $this->uri = '/Flows/' . \rawurlencode($flowSid) . '/Executions/' . \rawurlencode($executionSid) . '/Context';
    }

    /**
     * Fetch a ExecutionContextInstance
     *
     * @return ExecutionContextInstance Fetched ExecutionContextInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ExecutionContextInstance {
        $params = Values::of([]);

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ExecutionContextInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['executionSid']
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Studio.V2.ExecutionContextContext ' . \implode(' ', $context) . ']';
    }
}