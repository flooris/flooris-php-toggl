<?php namespace Flooris\PhpToggl;

class TogglReport
{
    use Traits\ReportDetails;

    /** Toggl Report API Version */
    const API_VERSION = 'v2';

    /** Toggl Report Base Endpoint URL */
    const API_BASE_ENDPOINT = 'reports/api/%s/%s';

    /** @var TogglRequest */
    private $request;

    /** @var array Errors */
    public $error = [];


    /**
     * Initialise the Toggl class
     *
     * @param bool|string $api_key
     * @internal param string $api_version
     */
    public function __construct($api_key = false)
    {
//        if(!$api_key){
//            throw new \Exception('Toggl API key required');
//        }
//        if(!$workspace_id){
//            throw new \Exception('Toggl Workspace ID required');
//        }
        $this->request = new TogglRequest($api_key);
    }

    /**
     * Send the request
     *
     * @param bool|string $http_method - REST('get','post','put','delete')
     * @param bool|string $endpoint
     * @param array $data
     * @return mixed
     */
    public function call($http_method = false, $endpoint = false, array $data = [])
    {
        if(!$http_method){
            $this->set_error(__FUNCTION__.'() - $http_method is required');
        }

        if(!$endpoint){
            $this->set_error(__FUNCTION__.'() - $endpoint is required');
        }

        if(count($this->error)){
            return $this->error;
        }

        $endpoint = sprintf(self::API_BASE_ENDPOINT, self::API_VERSION, $endpoint);

        return !count($data) ? $this->request->$http_method($endpoint) : $this->request->$http_method($endpoint, $data);
    }
}
