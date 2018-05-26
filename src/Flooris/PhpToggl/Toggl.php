<?php namespace Flooris\PhpToggl;

class Toggl{

    use Traits\Clients;
    use Traits\Dashboard;
    use Traits\Error;
    use Traits\Me;
    use Traits\Projects;
    use Traits\ProjectUsers;
    use Traits\Tags;
    use Traits\Tasks;
    use Traits\TimeEntries;
    use Traits\Users;
    use Traits\Workspaces;
    use Traits\WorkspaceUsers;


    private $request, $api_version;

    public $error = [];


    /**
     * Initialise the Toggl class
     *
     * @param bool|string $api_key
     * @throws \Exception
     * @internal param string $api_version
     */
    public function __construct($api_key = false)
    {
//        if(!$api_key){
//            throw new \Exception('Toggl API key required');
//        }
        $this->request = new TogglRequest($api_key);
    }

    /**
     * Send the request
     *
     * @param string $http_method - REST('get','post','put','delete')
     * @param string $endpoint
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

        $endpoint = 'api/v8/'.$endpoint;

        return !count($data) ? $this->request->$http_method($endpoint) : $this->request->$http_method($endpoint, $data);
    }
}
