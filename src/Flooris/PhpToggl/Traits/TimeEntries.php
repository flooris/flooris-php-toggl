<?php namespace Flooris\PhpToggl\Traits;

trait TimeEntries{


    /**
    * Get time entry
    *
    * @param int|string $id - Entry ID / 'current'
    * @return object
    */
    public function getTimeEntry($id = false){
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('get', 'time_entries/'.$id);
    }


    /**
    * Get active timer data
    *
    * @return object
    */
    public function getTimer(){
        return $this->getTimeEntry('current');
    }


    /**
    * Create / update entry
    *
    * NOTE: You can start the timer by setting $start_timer to true, although in the interest of your code clean, I'd suggest $this->startTimer().
    *
    * @param int $id Entry ID
    * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/time_entries.md#create-a-time-entry
    * @param bool $start_timer - Only if !$id
    * @return object
    */
    public function saveTimeEntry($id = false, $data = false, $start_timer = false)
    {
        if(!$data){
             $this->set_error_data(__FUNCTION__);
        }

        if(!$id && !$start_timer && (empty($data->start) || !$data->start || $data->start == null)){
            $start_timer = true;
        }

        if($start_timer){
            return $this->call('post', 'time_entries/start', $data);
        }

        return !$id ? $this->call('post', 'time_entries', $data) : $this->call('post', 'time_entries/'.$id, $data);
    }


    /**
    * Start timer
    *
    * @param object $data - See https://github.com/toggl/toggl_api_docs/blob/master/chapters/time_entries.md#start-a-time-entry
    * @return object
    */
    public function startTimer($data = false){
        if(!$data){
             $this->set_error_data(__FUNCTION__);

             return $this->call('post', 'time_entries/start');
        }

        return $this->saveTimeEntry($data, true);
    }


    /**
    * Stop timer
    *
    * @param int $id - Entry ID
    * @return object
    */
    public function stopTimer($id = false){
        if(!$id){
             $this->set_error_id(__FUNCTION__);
        }

        return $this->call('put', 'time_entries/'.$id);
    }

}
