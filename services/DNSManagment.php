<?php


class DNSManagment
{
    public function request($path, $method='GET', $params=[]){
        $time = time();
        $path = '/v1/user/self'.$path;
        $api = 'https://rest.url.sk';
        $apiKey = Config::API_KEY;
        $secret = Config::SECRET;
        $canonicalRequest = sprintf('%s %s %s', $method, $path, $time);
        $signature = hash_hmac('sha1', $canonicalRequest, $secret);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, sprintf('%s:%s', $api, $path));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $apiKey.':'.$signature);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Date: '.gmdate('Ymd\THis\Z', $time),]);
        if(!empty($params) && $method == 'POST') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

        }
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function listRecords($domain_name){
        $path = "/zone/$domain_name/record";

        return $this->request($path);
    }

    public function deleteRecord($domain_name, $record_id){
        $path = "/zone/$domain_name/record/$record_id";

        return $this->request($path);
    }

    public function createRecord($domain_name, $params){
        $path = "/zone/$domain_name/record";
        
        return $this->request($path, 'POST', $params);
    }

}