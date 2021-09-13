<h1>Modifier un article</h1>

<?php
// Va afficher le formulaire de modif avec les valeurs déjà remplies avec les messages d'erreurs de validation 
    echo $this->Form->create($article);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows' => '3']);
    echo $this->Form->button(__('Sauvegarder l\'article'));
    echo $this->Form->end();

?>