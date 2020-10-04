<?= $this->Form->create($user, ['class' => 'form-signin']) ?>

<h1 class="h3 mb-3 font-weight-normal">SignUp</h1>

<?= $this->Flash->render() ?>

<div class="form-group">
    <label>Name</label>
    <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Name', 'label' => false]) ?>
</div>

<div class="form-group">
    <label>Email</label>
    <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'E-mail', 'label' => false]) ?>
</div>

<div class="form-group">
    <label>Username</label>
    <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Username', 'label' => false]) ?>
</div>

<div class="form-group">
    <label>Password</label>
    <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => 'Password', 'label' => false]) ?>
</div>

<?= $this->Form->button(__('SignUP!'), ['class' => 'btn btn-lg btn-success btn-block']) ?>

<p class="text-center">
    Do you want to <?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>?
</p>

<?= $this->Form->end() ?>
