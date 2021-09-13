<h1>Articles</h1>

<?= $this->Html->link('Ajouter un article', ['action' => 'add']) ?> 

<table>
    <tr>
        <th>Titre</th>
        <th>Crée le</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <!-- A partir de là je boucle sur les objets query $articles pour afficher les infos de chaque articles -->

    <?php foreach($articles as $article) { ?>
        <tr>
            <!-- $this->Html est une instance du helper de CakePHP qui va apporter un rendu plus simple; 
            Ici ça va générer un lien HTML avec le texte fourni(premier param) et le lien(second param)-->
            <td><?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?></td>
            <td><?= $article->created->format(DATE_RFC850) ?> </td>
            <!-- Ajout du lien pour modifier l'article -->
            <td><?= $this->Html->link('Modifier', ['action'=>'edit', $article->slug]) ?></td>
            <!-- postLink va créer un lien JS pour faire une requête POST et supprimer l'article -->
            <td><?= $this->Form->postLink('Supprimer', 
                ['action'=> 'delete', $article->slug],
                ['confirm' => 'Êtes-vous sûr ?']) 
            ?></td>
        </tr>

    <?php } ?>

</table>