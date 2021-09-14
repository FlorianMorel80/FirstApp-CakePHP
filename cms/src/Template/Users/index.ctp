<h1>Utilisateurs</h1>

<?= $this->Html->link('Créer un utilisateur', ['action' => 'add']) ?>

<table>
    <tr>
        <th>ID</th>
        <th>Crée le</th>
        <th>Adresse mail</th>
        <th>Mot de passe</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <!-- A partir de là je boucle sur les objets query $users pour afficher les infos de chaque articles -->

    <?php foreach($users as $user) { ?>
        <tr>
            <!-- $this->Html est une instance du helper de CakePHP qui va apporter un rendu plus simple; 
            Ici ça va générer un lien HTML avec le texte fourni(premier param) et le lien(second param)-->
            <td><?= $this->Html->link($user->id, ['action' => 'view', $user->id]) ?></td>
            <td><?= $user->created->format(DATE_RFC850) ?> </td>
            <td><?= $this->Html->link($user->email, ['action' => 'view', $user->id]) ?></td>
            <td><?= $this->Html->link($user->password.substr(0,2), ['action' => 'view', $user->id], array('type' => 'password')) ?>********</td>
            <!-- Ajout du lien pour modifier l'user -->
            <td><?= $this->Html->link('Modifier', ['action'=>'edit', $user->id]) ?></td>
            <!-- postLink va créer un lien JS pour faire une requête POST et supprimer l'user -->
            <td><?= $this->Form->postLink('Supprimer', 
                ['action'=> 'delete', $user->id],
                ['confirm' => 'Êtes-vous sûr ?']) 
            ?></td>
        </tr>

    <?php } ?>

</table>