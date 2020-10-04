<?= $this->Form->create($user, ['class' => 'form-signin']) ?>

<h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>

<?= $this->Flash->render() ?>

<div class="form-group">
    <label>Password</label>
    <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password', 'label' => false]) ?>
</div>

<?= $this->Form->button(__('Reset Password!'), ['class' => 'btn btn-lg btn-danger btn-block']) ?>

<p class="text-center">
    Do you want to <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>?
</p>

<?= $this->Form->end() ?>
