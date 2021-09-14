<h1>Ajouter un article</h1>

<?php
// Nous utilisons le FormHelper pour générer l'ouverture du form HTML
// Les lignes suivantes votn générer l'équivalent de : <form method="post" action="/articles/add">
// En ne passant pas d'option URL, FormHelper va partir du principe que le formulaire doit être soumis sur l'action courante
    echo $this->Form->create($article);
    // $thi->Form->control est utilisé ici pour créer un élément de formulaire du même nom 
    // En premier param : indique à CakePHP le champs auquel il correspond
    // En second param : permet de définir un grand nombre d'options tel que le nb de ligne pour le textarea 
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['rows'=>'3']);
    echo $this->Form->button(__('Sauvegarder l\'article'));
    // va fermer le formulaire 
    // Ensuite il faut ajouter le lien sur de la page add.ctp sur l'index.ctp
    // $this->Form->end ferme le formulaire
    echo $this->Form->end();

?> 