<div class="row">
    <div class="panel panel-default panel-keynotes">
        <div class=" panel-heading">
            <h3 class="panel-title ">Groups
                <a id="" href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'create')) ?>" data-toggle="modal"  data-target="#myModal" class="btn pull-right btn-outline">Create</a>
                <button id="g-search-btn"  class="btn pull-right btn-outline">Search Group</button>
                <button id="g-data-btn"  class="btn pull-right btn-outline">Show Groups</button>
            </h3>
        </div>
        <div class="panel-body " id="grp-srch-box">
            <form data-example-id="input-group-with-button" class="searchform bs-example-form"> 
                <?php echo $this->Form->create('Keynotes', array('class' => 'searchform bs-example-form')); ?>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="input-group">
                            <?php
                            echo $this->Form->input('searchTerm', array(
                                'class' => 'form-control',
                                'placeholder' => 'Search for Group...',
                                'label' => false,
                                'div' => false
                            ));
                            ?>
                            <span class="input-group-btn">
                                <?php
                                echo $this->Form->submit('Go !', array(
                                    'class' => 'btn btn-default',
                                    'div' => false
                                ));
                                ?>
                            </span>


                        </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </form> 
        </div>
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

<div class="row " id="grp-data-box">
    <div class="col-md-6 ">
        <div class="panel panel-default panel-primary">
            <div class="panel-heading">Managed by you</div>
            <table class="table">

                <?php
                if (isset($groupData) && !empty($groupData)) {
                    $i = 1;
                    foreach ($groupData as $grps) {
                        ?>
                        <tr >
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td >

                                <?php echo $this->Html->link($grps['Group']['title'], array('controller' => 'groups', 'action' => 'v', $grps['Group']['group_unique_name'])); ?>
                            </td>
                            <td>
                                <span class="pull-right">
                                    <i class="fa fa-pencil"></i>
                                    <i class="fa fa-remove"></i>
                                </span>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tr>
                        <td>
                            <?php echo 'No Group created yet.'; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default panel-primary">
            <div class="panel-heading">Joined Groups</div>
            <table class="table">

                <?php
                if (isset($joinedGropus) && !empty($joinedGropus)) {
                    foreach ($joinedGropus as $jgrps) {
                        $i = 1;
                        ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link($jgrps['Group']['title'], array('controller' => 'groups', 'action' => 'v', $jgrps['Group']['group_unique_name'])); ?>
                            </td> 
                            <td>
                                <span class="pull-right">
                                    <i class="fa fa-pencil"></i>
                                    <i class="fa fa-remove"></i>
                                </span>
                            </td>
                        </tr>

                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tr>
                        <td>
                            <?php echo 'No Group joined yet.'; ?>
                        </td>
                    </tr>

                    <?php
                }
                ?>


            </table>
        </div>
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

                    <?php echo $this->Form->input('description', array('class' => 'form-control resize-none', 'placeholder' => 'Group Description', 'rows' => 2, 'label' => false)); ?>
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
<script>

    $(document).ready(function() {
        $('#g-search-btn').click(function() {
            //alert('I am working');
            $('#grp-data-box').css("display", "none");
            $('#grp-srch-box').css("display", "block");
            $('#g-data-btn').css("display", "block");
            $('#g-search-btn').css("display", "none");
        });

        $('#g-data-btn').click(function() {
            //alert('I am working');
            $('#grp-data-box').css("display", "block");
            $('#grp-srch-box').css("display", "none");
            $('#g-data-btn').css("display", "none");
            $('#g-search-btn').css("display", "block");
        });

    })
</script>