<?php

namespace TurkeySms;

use GuzzleHttp\Client;
use Exception;

class TurkeySms
{
    protected $client;
    protected $apiKey;
    protected $baseUrl = 'https://api.turkeysms.com.tr/';

    /**
     * @param string|null $apiKey
     */
    public function __construct($apiKey = null)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 10.0,
            'headers'  => [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ]
        ]);
    }

    /**
     * Set API Key
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Send Standard SMS
     */
    public function send(array $params)
    {
        return $this->request('sms/send', $params);
    }

    /**
     * Send OTP SMS
     */
    public function sendOtp(array $params)
    {
        return $this->request('otp/send', $params);
    }

    /**
     * Send Advanced OTP (Custom Text)
     */
    public function sendDetailedOtp(array $params)
    {
        return $this->request('otp/detailed', $params);
    }

    /**
     * Check Balance
     */
    public function getBalance()
    {
        return $this->request('balance/', []);
    }

    /**
     * Get SMS Status
     */
    public function getSmsStatus($sms_id)
    {
        return $this->request('sms/status', ['sms_id' => $sms_id]);
    }

    /**
     * Add to Blacklist
     */
    public function addToBlacklist($number)
    {
        return $this->request('blacklist/add', ['number' => $number]);
    }

    /**
     * Internal request handler
     */
    protected function request($endpoint, $data = [])
    {
        try {
            if (!$this->apiKey) {
                throw new Exception("TurkeySMS API Key is required.");
            }

            $data['api_key'] = $this->apiKey;

            $response = $this->client->post($endpoint, [
                'json' => $data
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'result_code' => 'LOCAL-ERR',
                'result_message' => $e->getMessage(),
                'result' => false
            ];
        }
    }
}
