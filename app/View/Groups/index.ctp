<div class="row">
    <div class="panel panel-default panel-keynotes">
        <div class="panel-heading">
            <h3 class="panel-title">Groups
                <a id="" href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'create')) ?>" data-toggle="modal"  data-target="#myModal" class="btn pull-right btn-outline">Create</a>
                <a id="" href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'create')) ?>" class="btn pull-right btn-outline">Search Group</a>
            </h3>
        </div>
        <!--        <div class="panel-body">
                     <form data-example-id="input-group-with-button" class="searchform bs-example-form"> 
        <?php // echo $this->Form->create('Keynotes', array('class' => 'searchform bs-example-form')); ?>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="input-group">
        <?php
        //   echo $this->Form->input('searchTerm', array(
        //        'class' => 'form-control',
        //         'placeholder' => 'Search for keynotes...',
        //          'label' => false,
        //        'div' => false
        //   ));
        ?>
                                <span class="input-group-btn">
        <?php
        //      echo $this->Form->submit('Go !', array(
        //         'class' => 'btn btn-default',
        //         'div' => false
        //  ));
        ?>
                                </span>
        
         <input type="text" class="form-control" placeholder="Search for keynotes..."> 
         <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
        </span> 
                            </div>
                        </div>
                    </div>
        <?php //echo $this->Form->end(); ?>
                     </form> 
                </div>-->
    </div>
</div>

<div class="search-result">
    <?php
    if (!empty($searchNotes)) {
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

<div class="">
    <div class="col-md-4">
        <h3>Managed by you</h3>
        <ul>
            <?php
            foreach ($groupData as $grps) {
                ?>
            <li>
                    <?php echo $this->Html->link($grps['Group']['title'],array('controller'=>'groups','action'=>'v',$grps['Group']['group_unique_name']));?>
            </li>
                <?php
            }
            ?>

        </ul>
    </div>
    <div class="col-md-4">
        <h3>Joined by you</h3>
         <ul>
            <?php
            foreach ($joinedGropus as $jgrps) {
                ?>
            <li>
                    <?php echo $this->Html->link($jgrps['Group']['title'],array('controller'=>'groups','action'=>'v',$jgrps['Group']['group_unique_name']));?>
            </li>
                <?php
            }
            ?>

        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header for_heading">
                <button type="button" class="close" 
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Create Group
                </h4>
            </div>
            <div class="modal-body">


                <?php
                echo $this->Form->create('Group', array(
                    'type' => 'file',
                    'url' => array('controller' => 'groups', 'action' => 'add')));
                ?>



                <div class="form-group">

                    <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Group Title', 'required' => 'required', 'label' => false)); ?>
                </div>

                <div class="form-group">

                    <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Group Description', 'type' => 'textarea', 'label' => false)); ?>
                </div>
                <div class="form-group">

                    <?php echo $this->Form->input('image', array('class' => 'form-control', 'type' => 'file', 'label' => false, 'div' => false)); ?>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" 
                        data-dismiss="modal">Close
                </button>


                <?php echo $this->Form->submit('Create', array('div' => false, 'class' => 'btn btn-primary ')); ?>
                <?php echo $this->Form->end(); ?>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>