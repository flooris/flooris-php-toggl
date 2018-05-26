<?php namespace Flooris\PhpToggl\Traits;

trait Clients{

    /**
    * Get Clients
    *
    * Returns either all clients (if $id - get single).
    *
    * @param int $id Client ID
    * @return Object
    */
    public function getClients($id = false)
    {
        return !$id ? $this->call('get','clients') : $this->call('get','clients/'.$id);
    }


    /**
    * Create / update client
    *
    * If $id - update.
    *
    * @param int $id Client ID
    * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/clients.md#create-a-client
    * @return object
    */
    public function saveClient($id = false, $data = false)
    {
        if(!$data){
             $this->set_error_data(__FUNCTION__);
        }

        return !$id ? $this->call('post','clients', $data) : $this->call('put','clients/'.$id, $data);
    }


    /**
    * Delete client
    *
    *
    * @param int $id Client ID
    * @return void|error
    */
    public function deleteClient($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('delete','clients/'.$id);
    }


    /**
    * Get client projects
    *
    *
    * @param int $id Client ID
    * @return Object
    */
    public function getClientProjects($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get','clients/'.$id.'/projects');
    }

}
