<?php namespace app;

use App\ApiRequest;
use App\FilterData;

class App
{
    private $apiRequest;
    public $data;

    public function __construct()
    {
        $this->apiRequest = new ApiRequest();
    }

    public function render()
    {
        return $this->getView();
    }

    public function getView()
    {
        ob_start();
        $className = $this->getUrlValues()->view;
        if (file_exists(dirname(__FILE__) . '/views/'.$className.'.php')) {

            switch ($this->getUrlValues()->view) {
                case 'api':
                    $filter = New FilterData($this->getUrlValues()->parameters);
                    $this->data = json_encode($filter->response());
                    include(dirname(__FILE__) . '/views/' . $this->getUrlValues()->view . '.php');
                    break;
                default:
                        include(dirname(__FILE__) . '/views/' . $this->getUrlValues()->view . '.php');
            }


        }else {
            $className = 'page-404';
            http_response_code(404);
            include(dirname(__FILE__) . '/views/exceptions/404.php');
        }
        $file_content = ob_get_contents();
        ob_end_clean();
        return $file_content;
    }

    private function getUrlValues()
    {
        $Url = $_SERVER['REQUEST_URI'];
        $Url = array_filter(explode('/', $Url));
        $response = new \stdClass();
        $response->view = count($Url) ? array_shift($Url) : 'index';
        $response->parameters = $Url;
        return $response;
    }


}