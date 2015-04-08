<div class="row">
<div class="panel panel-default panel-keynotes">
    <div class="panel-heading">
        <h3 class="panel-title">KeyNotes
        <a href="<?php echo $this->Html->url(array('controller' => 'key_notes','action' => 'mynotes'))?>" class="btn pull-right btn-outline">My Notes</a>
        <a href="<?php echo $this->Html->url(array('controller' => 'key_notes','action' => 'create'))?>" class="btn pull-right btn-outline">Create</a>
        </h3>
    </div>
    <div class="panel-body">
        <!-- <form data-example-id="input-group-with-button" class="searchform bs-example-form"> -->
            <?php echo $this->Form->create('Keynotes',array('class' => 'searchform bs-example-form')); ?>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="input-group">
                        <?php 
                        echo $this->Form->input('searchTerm',array(
                            'class' => 'form-control',
                            'placeholder' => 'Search for keynotes...',
                            'label' => false,
                            'div' => false
                        )); 
                        ?>
                        <span class="input-group-btn">
                        <?php
                        echo $this->Form->submit('Go !',array(
                            'class' => 'btn btn-default',
                            'div' => false
                        ));
                        ?>
                        </span>
                        
                        <!-- <input type="text" class="form-control" placeholder="Search for keynotes..."> -->
                        <!-- <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span> -->
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        <!-- </form> -->
    </div>
</div>
</div>

<div class="search-result">
    <?php 
    if(!empty($searchNotes)) {
        foreach ($searchNotes as $note) {
                ?>
                <div class="col-lg-4">
                    <div class="row">
                    <?php //pr($note); ?>
                    <div class="notes-callout notes-callout-info">
                        <a href="<?php echo $this->Html->url(array('controller' => 'key_notes', 'action' => 'view', $note['KeyNote']['id'])) ?>">
                            <div class="notes-cover notes-color-1">
                                <h2><?php echo $note['KeyNote']['title']; ?></h2>
                            </div>
                            <div class="notes-meta">
                                <div class="meta-category"><?php
                                    if (!empty($note['Category']['title'])) {
                                        echo $note['Category']['title'];
                                    } else {
                                        echo "Unknown";
                                    }
                                    ?>
                                </div>
                                <?php echo $note['KeyNote']['created']; ?>

                            </div>
                        </a>
</div>
                    </div>
                </div>
                <?php
            }
    }
    ?>
</div>