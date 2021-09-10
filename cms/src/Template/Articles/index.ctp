<h1>Articles</h1>

<?= $this->Html->link('Ajouter un article', ['action' => 'add']) ?> 

<table>
    <tr>
        <th>Titre</th>
        <th>Crée le</th>
    </tr>

    <!-- A partir de là je boucle sur les objets query $articles pour afficher les infos de chaque articles -->

    <?php foreach($articles as $article) { ?>
        <tr>
            <!-- $this->Html est une instance du helper de CakePHP qui va apporter un rendu plus simple; 
            Ici ça va générer un lien HTML avec le texte fourni(premier param) et le lien(second param)-->
            <td><?= $this->Html->link($articles->title, ['action' => 'view', $article->slug]) ?></td>
            <td><?= $articles->created->format(DATE_RFC850) ?> </td>
        </tr>

    <?php } ?>

</table>