<?php namespace Flooris\PhpToggl\Traits;

trait Workspaces{


    /**
    * Get workspaces
    *
    * @param int $id Workspace ID
    * @return object
    */
    public function getWorkspaces($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return !$id ? $this->call('get', 'workspaces') : $this->call('get', 'workspaces/'.$id);
    }


    /**
    * Update workspace
    *
    * @param int $id Workspace ID
    * @param object $data See https://github.com/toggl/toggl_api_docs/blob/master/chapters/workspaces.md#update-workspace
    * @return object
    */
    public function updateWorkspace($id = false, $data = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }
        if(!$data){
             $this->set_error_data(__FUNCTION__);
        }

        return $this->call('put', 'workspaces/'.$id, $data);
    }


    /**
    * Get workspace users
    *
    * @param int $id Workspace ID
    * @return object
    */
    public function getWorkspaceUsers($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'workspaces/'.$id.'/users');
    }


    /**
    * Get workspace clients
    *
    * @param int $id Workspace ID
    * @return object
    */
    public function getWorkspaceClients($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'workspaces/'.$id.'/clients');
    }


    /**
    * Get workspace projects
    *
    * @param int $id Workspace ID
    * @return object
    */
    public function getWorkspaceProjects($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'workspaces/'.$id.'/projects');
    }


    /**
    * Get workspace tasks
    *
    * @param int $id Workspace ID
    * @return object
    */
    public function getWorkspaceTasks($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'workspaces/'.$id.'/tasks');
    }


    /**
    * Get workspace tags
    *
    * @param int $id Workspace ID
    * @return object
    */
    public function getWorkspaceTags($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'workspaces/'.$id.'/tags');
    }
}
