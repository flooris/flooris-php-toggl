<?php namespace Flooris\PhpToggl\Traits;

trait ReportDetails
{
    /**
     * Get Report Details
     *
     * @param int $workspace_id
     * @param int $page
     * @param string $user_agent
     * @param null $since
     * @param null $until
     * @return mixed
     */
    public function get($workspace_id = 0, $page = 1, $user_agent = 'php-toggl', $since = null, $until = null)
    {
        $endpoint = "details?workspace_id={$workspace_id}&page={$page}&user_agent={$user_agent}";

        if ( $since ) {
            $endpoint .= "&since={$since}";
        }
        if ($until) {
            $endpoint .= "&until={$until}";
        }

        return $this->call('get', $endpoint);
    }
}
