<?php namespace  Flooris\PhpToggl;

use GuzzleHttp\Psr7\Request;

class TogglRequest{

    // CLient constants
    const REQ_POST = 'POST';
    const REQ_PUT = 'PUT';
    const REQ_GET = 'GET';
    const REQ_DELETE = 'DELETE';
    const REQ_CREATE = 'CREATE';

    // Endpoint starts here
    private $base_url = "https://www.toggl.com/";

    // Build errors
    private $errors = [];

    /** @var string */
    private $key;


    /**
     * Constructor
     *
     * @param string $key API key
     * @throws \Exception
     */

    public function __construct($key = null)
    {
        $this->key = $key;
    }



    /**
     * Errors
     *
     *
     * @return string|array|bool
     */
    public function errors()
    {
        return $this->errors;
    }



    /**
     * Post
     *
     *
     * @param str url Endpoint
     * @param array data
     * @return string|bool|null
     */
    public function post($url, array $data = [])
    {
        $data = $this->sanitizeBools($data);
        return $this->request(self::REQ_POST,$url, $data);
    }


    /**
     * Create
     *
     *
     * @param str url Endpoint
     * @param string data - JSON
     * @return string|bool|null
     */
    public function create($url, $data)
    {
        return $this->request(self::REQ_CREATE, $url, $data);
    }


    /**
     * Put
     *
     *
     * @param str url Endpoint
     * @param array data
     * @return string|bool|null
     */
    public function put($url, array $data = [])
    {
        $data = $this->sanitizeBools($data);
        return $this->request(self::REQ_PUT,$url, $data);
    }



    /**
     * Get
     *
     *
     * @param str url Endpoint
     * @return string|bool|null
     */
    public function get($url, array $data = [])
    {
        $data = $this->sanitizeBools($data);
        return $this->request(self::REQ_GET, $url, $data);
    }




    /**
     * Delete
     *
     *
     * @param str url Endpoint
     * @param array data
     * @return string|bool|null
     */
    public function delete($url, array $data = [])
    {
        return $this->request(self::REQ_DELETE,$url, $data);
    }




    /**
     * Process Request
     *
     * @param const method
     * @param str url Endpoint
     * @param array data
     * @return string|bool|null
     */
    private function request($method, $url, $data)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Authorization' => 'Basic '.base64_encode($this->key.':api_token')
            ]
        ]);
        try {
            switch ($method) {
                case in_array($method, ['GET','POST']):
                    if(count($data)){
                        $response = $client->request($method,$url,['json' => $data]);
                    } else {
                        $response = $client->request($method,$url);
                    }
                    break;
                case in_array($method, ['CREATE','PUT']):
                    $response = $client->request($method,$url, ['json' => $data]);
                    break;
                case 'DELETE':
                    $response = $client->request('DELETE', $url);
                    break;
                default:
                    $request = new Request($method, $url);
                    $response = $client->send($request);
                    break;
            }
        } catch (Exception $e) {
            $this->errors = [$e->getMessage()];
            return $this->errors;
        }
        return json_decode($response->getBody()->getContents());

    }


    private function sanitizeBools(array $data = [])
    {
        foreach ($data as $key => $value) {
            if($value === true){
                $data[$key] = "true";
            } elseif ($value === false){
                $data[$key] = "false";
            }
        }
        return $data;
    }
}
