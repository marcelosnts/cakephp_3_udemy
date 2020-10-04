<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">New About Company</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
                <?= $this->Html->link(__('All AboutCompanies'), ['controller' => 'AboutComps', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('All AboutCompanies'), ['controller' => 'AboutComps', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                </div>
            </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<?= $this->Form->create($aboutComp, ['enctype' => 'multipart/form-data']) ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Title</label>
            <?= $this->Form->control('title', ['class' => 'form-control', 'placeholder' => 'Company name', 'label' => false]) ?>
        </div>
        <div class="form-group col-md-6">
            <label> Situation</label>
            <?= $this->Form->control('situation_id', ['class' => 'form-control', 'placeholder' => 'Situation', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label> Description</label>
            <?= $this->Form->control('description', ['class' => 'form-control', 'placeholder' => 'Description', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Company Image (500x400)</label>
            <?= $this->Form->control('image', ['type' => 'file', 'label' => false, 'onChange' => 'previewImage()']) ?>
        </div>

        <div class="form-group col-md-6">
            <?php
                if($aboutComp->image !== null){
                    $old_image = '../../files/aboutComp/' . $aboutComp->id . '/' . $aboutComp->image;
                }else{
                    $old_image = '../../files/aboutComp/preview_img.jpg';
                }
            ?>

            <img id="preview-img" src="<?= $old_image ?>" alt="<?= $aboutComp->name ?>" class="img-thumbnail" style="width: 250px; height: 150px">
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Required
    </p>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>

<?= $this->Form->end() ?>

