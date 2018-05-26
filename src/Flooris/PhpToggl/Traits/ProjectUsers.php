<?php namespace Flooris\PhpToggl\Traits;

trait ProjectUsers{

    /**
    * Create / Update Project User
    *
    * NOTE: It is possible to mass-create project users by specifying multiple, comma separated user IDs, i.e. $project_user->uid = "123,456".
    * NOTE: You can mass-update project users simultaneously by specifying an array instead of an int - [123, 456]
    *
    * @param int|array $id Project User ID (NOT User ID, this is the relational ID)
    * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/project_users.md#create-a-project-user
    * @return Object
    */
    public function saveProjectUser($id = false, $data = false)
    {
        if(!$data){
             $this->set_error_data(__FUNCTION__);
        }

        if(is_array($id)){
            $id = implode(',',$id);
        }

        return !$id ? $this->call('post', 'project_users', $data) : $this->call('put', 'project_users/'.$id, $data);
    }


    /**
    * Delete Project User
    *
    *
    * @param int|array $id Project User ID
    * @return void
    */
    public function deleteProjectUser($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        if(is_array($id)){
            $id = implode(',',$id);
        }

        return $this->call('delete', 'project_users/'.$id);
    }
}
