<?php
namespace core\entities;

class Membership
{
    private $membership = null;
    public function __construct($id = null)
    {
        if (!$id) {
            return;
        }
        return $this->membership = \DB::table('core_membership_packages')
            ->where('id', $id)->first();
    }
    public function all()
    {
        return \DB::table('core_membership_packages')->get();
    }

    public function get($key = null)
    {
        if (!$this->membership) {
            return null;
        }
        $workspace = $this->getWorkspace();
        if (!$key) {
            return $this->membership;
        }
        $this->membership->workspaceName = $workspace->name;
        $this->membership->workspaceID = $workspace->id;
        $this->membership->currency = $workspace->currency;
        return (isset($this->membership->$key)) ? $this->membership->$key : null;
    }

    private function getWorkspace()
    {
        $id = $this->membership->core_workspace_id;
        return \DB::table('core_workspace')->where('id', $id)->first();
    }
}
