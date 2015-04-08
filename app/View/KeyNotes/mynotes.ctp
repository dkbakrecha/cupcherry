<div class="row keynotes-view">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">My KeyNotes
                <a href="<?php echo $this->Html->url(array('controller' => 'key_notes', 'action' => 'create')) ?>" class="btn pull-right btn-outline">Create</a>
            </h3>
        </div>
        <div class="panel-body">


            <div class="row">
                <table class="table">
                    <tr>
                        <th>Note Title</th>
                        <th>Category</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    if (!empty($notesData)) {
                        foreach ($notesData as $note) {
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'key_notes', 'action' => 'view', $note['KeyNote']['id'])) ?>">
                                        <?php echo $note['KeyNote']['title']; ?>
                                    </a>
                                </td>
                                <td>
                                    <div class="meta-category"><?php
                                        if (!empty($note['Category']['title'])) {
                                            echo $note['Category']['title'];
                                        } else {
                                            echo "Unknown";
                                        }
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $note['KeyNote']['created']; ?>
                                </td>
                                <td>
                                    <span class="btn btn-default"> <i class="fa fa-edit"></i> Edit </span>
                                    <span class="btn btn-default"> <i class="fa fa-trash"></i> Delete </span>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo __("No notes found");
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
</div>
