<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Bulkexports\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class ExportConfigurationTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->bulkexports->v1->exportConfiguration("resource_type")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://bulkexports.twilio.com/v1/Exports/resource_type/Configuration'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "url": "https://bulkexports.twilio.com/v1/Exports/Calls/Configuration",
                "enabled": true,
                "webhook_url": "",
                "webhook_method": "",
                "resource_type": "Calls"
            }
            '
        ));

        $actual = $this->twilio->bulkexports->v1->exportConfiguration("resource_type")->fetch();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->bulkexports->v1->exportConfiguration("resource_type")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://bulkexports.twilio.com/v1/Exports/resource_type/Configuration'
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "url": "https://bulkexports.twilio.com/v1/Exports/Calls/Configuration",
                "enabled": true,
                "webhook_url": "",
                "resource_type": "Calls",
                "webhook_method": ""
            }
            '
        ));

        $actual = $this->twilio->bulkexports->v1->exportConfiguration("resource_type")->update();

        $this->assertNotNull($actual);
    }
}