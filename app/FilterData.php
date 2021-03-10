<?php namespace App;

class FilterData
{
    private $apiRequest;
    private $data;
    private $parameters;

    public function __construct($parameters)
    {
        $this->apiRequest = new ApiRequest();
        $this->parameters = $parameters;
        $this->data = json_decode($this->apiRequest->call('GET', 'https://jsonplaceholder.typicode.com/users', false));
    }

    private function findValue()
    {
        $result = [];
        if (!empty($this->parameters)) {
            $mail = $this->parameters[0];
            foreach ($this->data as $data) {
                if (strtolower($data->email) == strtolower($mail)) {
                    array_push($result, $data);
                    break;
                };
            }
        } else {
            return $this->data;
        }
        return $result;
    }

    public function response()
    {

        $code = 200;
        $message = [
            'error' => []
        ];
        if (empty($this->parameters)) {
            $message['data'] = $this->data;
        } else {
            $mail = $this->parameters[0];
            $validation = $this->validateEmail($mail);
            if (!$validation->isValid) {
                $message['status'] = 'no-valid';
                $message['data'] = [];
                $message['error'] = $validation->message;
            } else {
                $find = $this->findValue();
                $message['status'] = empty($find) ? 'not-found' : 'ok';
                $message['data'] = $this->findValue();
                $message['error'] = empty($find) ? 'Email does not exist' : '';
            }
        }
        http_response_code($code);
        return $message;
    }

    private function validateEmail($email)
    {
        $response = new \stdClass();
        $response->message = 'Hi, please enter a valid email address';
        $response->isValid = false;
        //
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response->isValid = true;
            $response->message = '';
        }
        return $response;
    }

}