<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class Disable extends AbstractAction
{
    public function getTitle()
    {
        return 'Disable';
    }

    public function getIcon()
    {
        return 'voyager-x';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-danger pull-right',
            'onclick' => "return confirm('Do you really want to disable this user?');",
        ];
    }

    public function getDefaultRoute()
    {
        return route('users.disable', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
    public function shouldActionDisplayOnDataType()
{
    return $this->dataType->slug == 'users';
}
}
?>