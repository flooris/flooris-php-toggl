<?php namespace Flooris\PhpToggl\Traits;

trait Tasks{

    /**
    * Get Task
    *
    *
    * @param int $id Task ID
    * @return Object
    */
    public function getTask($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'tasks/'.$id);
    }



    /**
    * Create / Update Tasks
    *
    *
    * @param int|array $id Task ID (for multiple, [123,456])
    * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/tasks.md#create-a-task
    * @return Object
    */
    public function saveTask($id = false, $data = false)
    {
        if(!$data){
             $this->set_error_data(__FUNCTION__);
        }

        if(is_array($id)){
            $id = implode(',',$id);
        }

        return !$id ? $this->call('post', 'tasks', $data) : $this->call('put', 'tasks/'.$id, $data);
    }


    /**
    * Delete Tasks
    *
    *
    * @param int|array $id Task ID (for multiple, [123,456])
    * @return void
    */
    public function deleteTask($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        if(is_array($id)){
            $id = implode(',',$id);
        }

        return $this->call('delete', 'tasks/'.$id);
    }
}
