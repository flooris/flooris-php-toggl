<?php namespace Flooris\PhpToggl\Traits;

trait WorkspaceUsers{


    /**
    * Invite users to workspace
    *
    *
    * @param int $id Workspace ID
    * @param array $email Invitee email addresses ['example@whatevs.com','whatevs@example.com']
    * @return object
    */
    public function inviteUsers($id = false, array $email = [])
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        if(!count($email)){
             $this->set_error(__FUNCTION__.'() - $email array requires at least one email.');
        }

        $data = new stdClass();
        $data->emails = $email;

        return $this->call('get', 'workspaces/'.$id.'/invite', $data);
    }


    /**
    * Delete workspace user
    *
    *
    * @param int $id Workspace ID
    * @return void
    */
    public function deleteWorkspaceUser($id = false)
    {
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }
        return $this->call('delete', 'workspace_users/'.$id);
    }

}
