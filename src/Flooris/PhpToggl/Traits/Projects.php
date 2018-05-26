<?php namespace Flooris\PhpToggl\Traits;

trait Projects{

    /**
    * Get Project
    *
    *
    * @param int $id Project ID
    * @return Object
    */
    public function getProject($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'projects/'.$id);
    }


    /**
    * Create / Update Project
    *
    *
    * @param int $id Project ID
    * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/projects.md#create-project
    * @return Object
    */
    public function saveProject($id = false, $data = false)
    {
        if(!$data){
             $this->set_error_data(__FUNCTION__);
        }

        return !$id ? $this->call('post', 'projects', $data) : $this->call('put', 'projects/'.$id, $data);
    }


    /**
    * Delete Project(s)
    *
    *
    * @param int|array $id Project ID (array for multiple)
    * @return void
    */
    public function deleteProject($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        if(is_array($id)){
            $id = implode(',',$id);
        }

        return $this->call('delete', 'projects/'.$id);
    }


    /**
    * Get Project Users
    *
    *
    * @param int $id Project ID
    * @return object
    */
    public function getProjectUsers($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'projects/'.$id.'/project_users');
    }


    /**
    * Get Project Users
    *
    *
    * @param int $id Project ID
    * @return object
    */
    public function getProjectTasks($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'projects/'.$id.'/tasks');
    }
}
