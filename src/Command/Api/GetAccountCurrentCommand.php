<?php

namespace EMailChef\Command\Api;

use EMailChef\Service\ApiService;

class GetAccountCurrentCommand
{
    protected $apiService;

    public function __construct($apiService = null)
    {
        $this->apiService = $apiService ?: new ApiService();
    }

    /**
     * @throws \Exception
     */
    public function execute($headers)
    {
        $response = $this->apiService->call('get', '/apps/api/v1/accounts/current', [], $headers);
        if ($response['code'] == '200') {
            return $response['body'];
        }
        throw new \Exception('Unable to login', $response['code']);
    }
}
