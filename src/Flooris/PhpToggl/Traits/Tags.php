<?php namespace Flooris\PhpToggl\Traits;

trait Tags{

        /**
        * Create / Update Tag
        *
        *
        * @param int $id Tag ID
        * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/tags.md#create-tag
        * @return Object
        */
        public function saveTag($id = false, $data = false)
        {
            if(!$data){
                 $this->set_error_data(__FUNCTION__);
            }

            return !$id ? $this->call('post', 'tags', $data) : $this->call('put', 'tags/'.$id, $data);
        }


        /**
        * Delete Tag
        *
        *
        * @param int $id Tag ID
        * @return void
        */
        public function deleteTag($id = false)
        {
            if(!$id){
                 $this->set_error_id(__FUNCTION__);
            }

            return $this->call('delete', 'tags/'.$id);
        }

}
