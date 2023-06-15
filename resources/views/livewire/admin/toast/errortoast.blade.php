<?php
    if ($errors->any())
    {
        foreach ($errors->all() as $error)
        {
            $this->emit('toast', 'error', $error, '#FFFFFF' ,'#CB4335');

        }
    }
?>
