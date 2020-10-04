<?= $this->Form->create('post', ['class' => 'form-signin']) ?>

<?= $this->Html->image('logo_celke.png', ['class' => 'mb-4', 'alt' => 'Celke', 'width' => '72', 'height' => '72']) ?>

<h1 class="h3 mb-3 font-weight-normal">Login</h1>

<?= $this->Flash->render() ?>

<div class="form-group">
    <label>Username</label>
    <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Enter your user:', 'label' => false]) ?>
</div>
<div class="form-group">
    <label>Password</label>
    <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Enter your password:', 'label' => false]) ?>
</div>

<?= $this->Form->button(__('Login'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>
<p class="text-center">
    <?= $this->Html->link(__('SignUP'), ['controller' => 'Users', 'action' => 'signup']) ?> -
    <?= $this->Html->link(__('Forgot your password?'), ['controller' => 'Users', 'action' => 'passwordRecovery']) ?>
</p>

<?= $this->Form->end() ?>
