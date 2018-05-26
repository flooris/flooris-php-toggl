<?php namespace Flooris\PhpToggl\Traits;

trait Me{

    /**
    * Get API User Data
    *
    *
    * @return Object
    */
    public function getMe()
    {
        return $this->call('get', 'me');
    }

    /**
    * Update API User Data
    *
    *
    * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/users.md#update-user-data
    * @return Object
    */
    public function saveMe($data = false)
    {
        if(!$data){
             $this->set_error_data(__FUNCTION__);
        }

        return $this->call('put', 'me', $data);
    }


    /**
    * Reset API Key
    *
    * @return string - New API token. Old one WILL NOT WORK going forward.
    */
    public function resetApiKey()
    {
        return $this->call('post', 'reset_token');
    }

}
