<?php namespace Flooris\PhpToggl\Traits;

trait Dashboard{

    /**
    * Get Dashboard
    *
    *
    * @param int $w_id Workspace ID. If not set, User default for API key owner used.
    * @return Object
    */
    public function getDashboard($w_id = false)
    {
        return !$w_id ? $this->call('get','dashboard') : $this->call('get','dashboard/'.$w_id);
    }
}
