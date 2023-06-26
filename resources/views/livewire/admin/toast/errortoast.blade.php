<?php
    if ($errors->any())
    {
        foreach ($errors->all() as $error)
        {
            $this->emit('toast', 'error', $error, 'خطا');
        }
        $this->emit('modalClosed');
        $this->resetErrorBag();
    }
?>
