<h1><?= 'Utilisateur numéro : ' . h($user->id) ?></h1>
<p><?= h($article->email) ?></p>
<p><small>Crée le : <?= $article->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Modifier', ['action' => 'edit', $article->slug]) ?></p>

