<main role="main">
    <div class="jumbotron contato">
        <div class="container">
            <h2 class="display-4 text-center contato-titulo">Contact</h2>

            <?= $this->Flash->render() ?>

            <?= $this->Form->create($contactMsg) ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Nome</label>
                        <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Name', 'label' => false]) ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Email</label>
                        <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => false]) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label><span class="text-danger">*</span> Assunto</label>
                    <?= $this->Form->control('subject', ['class' => 'form-control', 'placeholder' => 'Subject', 'label' => false]) ?>
                </div>

                <div class="form-group">
                    <label><span class="text-danger">*</span> Message</label>
                    <?= $this->Form->control('message', ['class' => 'form-control', 'placeholder' => 'Message', 'rows' => 4, 'label' => false]) ?>
                </div>

                <p>
                    <span class="text-danger">* </span>Required
                </p>

                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>

            <hr class="featurette-divider">
        </div>
    </div>
</main>
