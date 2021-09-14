<h1>Ajouter un nouvel utilisateur</h1>

<?php
    echo $this->Form->create($user);
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->button(__('Ajouter l\'utilisateur'));
    echo $this->Form->end();

?>