<h1><?= 'Utilisateur numéro : ' . h($user->email) ?></h1>
<p><small>Crée le : <?= $user->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Modifier', ['action' => 'edit', $user->email]) ?></p>

