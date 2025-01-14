<?php

namespace EMailChef\Service;

class ApiService
{
    const ENDPOINT = 'https://app.emailchef.com';

    public function call($method, $path, $data = null, $headers = [])
    {

        $endpoint_url = self::ENDPOINT;
        $endpoint_path = $endpoint_url . $path;

        switch ($method) {
            case 'post':
                $response = \Httpful\Request::post($endpoint_path, $data);
                break;
            case 'delete':
                $response = \Httpful\Request::delete($endpoint_path, $data);
                break;
            case 'put':
                $response = \Httpful\Request::put($endpoint_path, $data);
                break;
            case 'get':
            default:
                $response = \Httpful\Request::get($endpoint_path);
                break;
        }


        $response = $response->addHeader('Content-Type', 'application/json');

        if (!empty($headers)) {
            $response = $response->addHeaders($headers);
        }

        $response = $response->send();

        return array('body' => $response->body, 'code' => $response->code, 'debug' => $response);
    }
}
