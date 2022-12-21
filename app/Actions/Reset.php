<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class Reset extends AbstractAction
{
    public function getTitle()
    {
        return 'Reset Password';
    }

    public function getIcon()
    {
        return 'voyager-refresh';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right',
            'onclick' => "return confirm('Do you really want to reset the password?');",
        ];
    }

    public function getDefaultRoute()
    {
        return route('users.reset', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
    public function shouldActionDisplayOnDataType()
{
    return $this->dataType->slug == 'users';
}
}
?>