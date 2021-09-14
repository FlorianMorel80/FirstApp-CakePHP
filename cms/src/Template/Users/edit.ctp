<h1>Modifier l'utilisateur</h1>

<?php 
    //echo $this->Form->create($user);
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->button(__('Modifier l\'utilisateur'));
    echo $this->Form->end();

?>
