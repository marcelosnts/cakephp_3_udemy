<?= $this->Form->create($user, ['class' => 'form-signin']) ?>

<h1 class="h3 mb-3 font-weight-normal">Password recovery</h1>

<?= $this->Flash->render() ?>

<div class="form-group">
    <label>Email</label>
    <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'E-mail', 'label' => false]) ?>
</div>

<?= $this->Form->button(__('Send recovery mail!'), ['class' => 'btn btn-lg btn-warning btn-block']) ?>

<p class="text-center">
    Do you want to <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>?
</p>

<?= $this->Form->end() ?>
