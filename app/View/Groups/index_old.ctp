<?php
//prd($groupData);
echo $this->Html->css('front/datatable/jquery.dataTables');
echo $this->Html->script(array(
    //'jQueryv1.11.1',
    'front/datatable/jquery.dataTables.min'));
?>


<div class="row">
    <div class="col-md-12 for_heading">
        <span><h3>Groups</h3></span>
    </div>
    <div class="col-md-12">
        <h3 class="display-block">Groups Created</h3>
        <a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'add')); ?>" class="btn btn-primary pull-right">Add Group</a>
        <hr>
    </div>



</div>
<div class="row border_group">
    <div class="col-md-12">
        <table class="table table-message" id="example">

            <thead>
            <th class="cell-check " width="75">
                ID
            </th>
            <th class="cell-author hidden-phone hidden-tablet" >
                Product Name
            </th>
            <th class="cell-author hidden-phone hidden-tablet" >
                Total Members
            </th>
            <th class="cell-author hidden-phone hidden-tablet" >
                Managed By
            </th>



            </thead>


            <tbody>



                <?php
                foreach ($groupData as $groups) {
                    ?>
                    <tr class="unread">
                        <td class="cell-check" width="75">

                            <?php echo $groups['Group']['id']; ?>

                        </td>
                        <td class="cell-author hidden-phone hidden-tablet" >
                            <?php
                            echo $this->Html->link($groups['Group']['title'], array(
                                'controller' => 'groups',
                                'action' => 'view', $groups['Group']['id']
                            ));
                            ?>

                        </td>
                        <td class="cell-time " >
                            <?php echo $groups['Group']['total_member']; ?>
                        </td>
                        <td class="cell-time " >
                            <?php echo $groups['Group']['managed_by']; ?>
                        </td>


                    </tr>

                    <?php
                }
                ?>


            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 class="display-block">Groups Joined</h3>
        <a href="<?php echo $this->Html->url(array('controller' => 'groups', 'action' => 'add')); ?>" class="btn btn-primary pull-right">Add Group</a>
        <hr>
    </div>



</div>

<div class="row border_group">
    <div class="col-md-12">
        <table class="table table-message" id="example">

            <thead>
            <th class="cell-check " width="75">
                ID
            </th>
            <th class="cell-author hidden-phone hidden-tablet" >
                Group Name
            </th>
            <th class="cell-author hidden-phone hidden-tablet" >
                Total Members
            </th>
            <th class="cell-author hidden-phone hidden-tablet" >
                Managed By
            </th>



            </thead>


            <tbody>



                <?php
                foreach ($joinedGropus as $groups) {
                    ?>
                    <tr class="unread">
                        <td class="cell-check" width="75">

                            <?php echo $groups['Group']['id']; ?>

                        </td>
                        <td class="cell-author hidden-phone hidden-tablet" >
                            <?php
                            echo $this->Html->link($groups['Group']['title'], array(
                                'controller' => 'groups',
                                'action' => 'view', $groups['Group']['id']
                            ));
                            ?>

                        </td>
                        <td class="cell-time " >
                            <?php echo $groups['Group']['total_member']; ?>
                        </td>
                        <td class="cell-time " >
                            <?php echo $groups['Group']['managed_by']; ?>
                        </td>


                    </tr>

                    <?php
                }
                ?>


            </tbody>
        </table>
    </div>
</div>


<script>


    $(document).ready(function() {

        var myTable = $('#example').dataTable({
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [3]
                },
            ],
            "order": [[0, 'asc']],
        });



    });

</script>
