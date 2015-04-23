<?php
//prd($parData);
?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-group"></i>
            <h3>Parents List</h3>
            <a href="
            <?php echo $this->Html->url(array('plus' => true, 'controller' => 'parents', 'action' => 'add')); ?>
               " class="btn btn-primary pull-right"> Add New Member</a>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div class="12">
                <table class="table table-bordered">
                    <tr>
                        <th>Sn</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Relation</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>




                    <?php
                    $i = 1;
                    foreach ($parData as $parlist) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $parlist['ParentProfile']['id']; ?>
                            </td>
                            <td>
                                <?php echo $parlist['ParentProfile']['fname'] . ' ' . $parlist['ParentProfile']['lname']; ?>
                            </td>
                            <td>
                                <?php echo $parlist['User']['email']; ?>
                            </td>
                            <td>
                                <?php echo $parlist['ParentProfile']['relation']; ?>
                            </td>
                            <td>
                                <?php
                                if ( $parlist['ParentProfile']['status'] == 1) {
                                    ?>
                                    <i class="fa fa-square greencolor"></i>
                                    <?php
                                } elseif ( $parlist['ParentProfile']['status'] == 3) {
                                    ?>
                                    <i class="fa fa-square yellowcolor"></i> <button>Resend Request</button>
                                    <?php
                                }
                                ?>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <?
                    $i ++;
                    }

                    ?>

                </table>
            </div>

        </div>
    </div>
</div>