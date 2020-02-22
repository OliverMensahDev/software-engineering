<?php
namespace core\entities;

require_once config('devless')['system_class'];

class Workspace
{
    private $workspace = null;
    public function __construct($id = null)
    {
        if (!$id) {
            return;
        }
        $this->workspace = \DB::table('core_workspace')
            ->where('id', $id)->first();
    }
    public function all()
    {
        return \DB::table('core_workspace')->get();
    }

    public function get($key = null)
    {
        if (!$this->workspace) {
            return null;
        }
        $memberships = $this->getMemberships();
        if (!$key) {
            return $this->$workspace;
        }
        $this->workspace->memberships = $memberships;
        return (isset($this->workspace->$key)) ? $this->workspace->$key : null;
    }

    public function getWorkspace($id) 
    {
        return \DB::table('core_workspace')->where('id', $id)->first();
    }
    private function getMemberships()
    {
        $id = $this->workspace->id;
        return \DB::table('core_membership_packages')->where('id', $id)->first();
    }
}
