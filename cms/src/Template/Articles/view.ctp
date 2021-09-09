<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><small>Crée le : <?= $article->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Modifier', ['action' => 'edit', $article->slug]) ?></p>

