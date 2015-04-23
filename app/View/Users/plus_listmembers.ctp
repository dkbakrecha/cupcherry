<?php
//prd($membersList);
?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-group"></i>
            <h3>Members</h3>
            <a href="
            <?php echo $this->Html->url(array('plus' => true, 'controller' => 'users', 'action' => 'addmember')); ?>
               " class="btn btn-primary pull-right"> Add New Member</a>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div class="12">
                <table class="table table-bordered">
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>




                    <?php
                    $i = 1;
                    foreach ($membersList as $memlist) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $memlist['UserProfile']['fname'] . ' ' . $memlist['UserProfile']['lname']; ?>
                            </td>
                            <td>
                                <?php echo $memlist['User']['email']; ?>
                            </td>
                            <td>
                                <?php
                                if ($memlist['OrgMember']['status'] == 1) {
                                    ?>
                                    <i class="fa fa-square greencolor"></i>
                                    <?php
                                } elseif ($memlist['OrgMember']['status'] == 3) {
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