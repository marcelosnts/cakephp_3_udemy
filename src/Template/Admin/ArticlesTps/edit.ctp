<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesTp $articlesTp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $articlesTp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articlesTp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles Tps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="articlesTps form large-9 medium-8 columns content">
    <?= $this->Form->create($articlesTp) ?>
    <fieldset>
        <legend><?= __('Edit Articles Tp') ?></legend>
        <?php
            echo $this->Form->control('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
