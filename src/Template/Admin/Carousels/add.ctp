<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">New Carousel</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
                <?= $this->Html->link(__('All Carousels'), ['controller' => 'Carousels', 'action' => 'index'], ['class' => 'btn btn-outline-info btn-sm']) ?>
            </span>
            <div class="dropdown d-block d-md-none">
                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                    <?= $this->Html->link(__('All Carousels'), ['controller' => 'Carousels', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                </div>
            </div>
    </div>
</div><hr>

<?= $this->Flash->render() ?>

<?= $this->Form->create($carousel, ['enctype' => 'multipart/form-data']) ?>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Name</label>
            <?= $this->Form->control('carousel_name', ['class' => 'form-control', 'placeholder' => 'Carousel name', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Title</label>
            <?= $this->Form->control('title', ['class' => 'form-control', 'placeholder' => 'Title', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label> Description</label>
            <?= $this->Form->control('description', ['class' => 'form-control', 'placeholder' => 'Description', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label> Button title</label>
            <?= $this->Form->control('button_title', ['class' => 'form-control', 'placeholder' => 'Button title', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-4">
            <label> Button Link</label>
            <?= $this->Form->control('link', ['class' => 'form-control', 'placeholder' => 'Button link', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-4">
            <label> Button Color</label>
            <?= $this->Form->control('color_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Text position</label>
            <?= $this->Form->control('position_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>

        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Situation</label>
            <?= $this->Form->control('situation_id', ['class' => 'form-control', 'label' => false]) ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label><span class="text-danger">*</span> Carousel Image (1920x846)</label>
            <?= $this->Form->control('image', ['type' => 'file', 'label' => false, 'onChange' => 'previewImage()']) ?>
        </div>

        <div class="form-group col-md-6">
            <?php
                if($carousel->image !== null){
                    $old_image = '../../files/carousel/' . $carousel->id . '/' . $carousel->image;
                }else{
                    $old_image = '../../files/carousel/preview_img.jpg';
                }
            ?>

            <img id="preview-img" src="<?= $old_image ?>" alt="<?= $carousel->name ?>" class="img-thumbnail" style="width: 250px; height: 150px">
        </div>
    </div>

    <p>
        <span class="text-danger">* </span>Required
    </p>

    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>

<?= $this->Form->end() ?>

