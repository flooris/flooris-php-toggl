<?php namespace Flooris\PhpToggl\Traits;

trait Error{

    /**
     * Add message to error array
     *
     *
     * @param string $data Error message content
     */

    protected function set_error($data)
    {
        $this->error['errors'][] = $data;
    }



    /**
     * Adds a common error ($id missing, no $data)
     *
     *
     * @param string $data Error message content
     */

    protected function set_error_data($data)
    {
        $this->error['errors'][] = $data.'() -> $data must be provided.';
    }

    protected function set_error_id($data)
    {
       $this->error['errors'][] = $data.'() -> $id must be provided.';
    }
}
