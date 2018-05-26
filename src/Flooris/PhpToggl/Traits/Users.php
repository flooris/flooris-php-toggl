<?php namespace Flooris\PhpToggl\Traits;

trait Users{

    /**
    * Sign up new user
    *
    * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/users.md#sign-up-new-user
    * @return object
    */
    public function createUser($data = false)
    {
        if(!$data){
             $this->set_error_data(__FUNCTION__);
        }

        return $this->call('post', 'signups', $data);
    }
}
