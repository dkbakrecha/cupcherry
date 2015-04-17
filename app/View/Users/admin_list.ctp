
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-users"></i>
                    User Details 
                </h3>
                <ul class="portlet-tools pull-right">
                    <li>
                        <a class="btn btn-sm btn-default" href="<?php echo $this->Html->url(array('admin' => true, 'controller' => 'users', 'action' => 'add')); ?>">
                            Add User
                        </a>
                    </li>
                </ul>
            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           

                <div class="table-responsive">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                        
                        <table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered table-hover table-highlight table-checkable dataTable-helper dataTable datatable-columnfilter" data-provide="datatable" data-display-rows="10" data-info="true" data-search="true" data-length-change="true" data-paginate="true">
                            <tbody aria-relevant="all" aria-live="polite" role="alert"> 
                                <?php
                                foreach ($listUsers as $user) {
                                    ?>
                                    <tr class="odd">
                                        <td class="sorting_2">
                                            <?php
                                            echo $this->Form->checkbox('checkboxid', array('class' => 'chk', 'name' => 'chkid[]', 'value' => $user['User']['id']));
                                            // echo $this->Form->input('checkbox',array('id'=>'checks','value'=>''))
                                            ?>

                                        </td>
                                        <td class="sorting_1">   
                                            <?php echo $user['User']['id']; ?>
                                        </td>

                                        <td class="  sorting_1"><?php echo $user['UserProfile']['fname'] . " &nbsp; " . $user['UserProfile']['lname'] ?></td>
                                        <td class="  sorting_2"><?php echo $user['User']['email'] ?></td>
                                        <td class=" "><?php echo $user['User']['contact'] ?></td>
                                        <td class=" "><?php echo $user['User']['created'] ?></td>
                                        <td class="hidden-xs hidden-sm " align="center">
                                            <span class="btn btn-sm btn-default">
                                                <?php
                                                if ($user['User']['status'] == 0) {
                                                    ?>
                                                    <i class="fa fa-circle redcolor"></i>
                                                    <?php
                                                } elseif ($user['User']['status'] == 1) {
                                                    ?>
                                                    <i class="fa fa-circle greencolor"></i>
                                                    <?php
                                                } elseif ($user['User']['status'] == 2) {
                                                    ?>
                                                    <i class="fa fa-circle blackcolor"></i>
                                                    <?php
                                                } elseif ($user['User']['status'] == 3) {
                                                    ?>
                                                    <i class="fa fa-circle yellowcolor"></i>
                                                    <?php
                                                }
                                                ?>
                                            </span>

                                            <a href="" class="btn btn-sm btn-default"><i class="fa fa-user"></i> View</a>
                                            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_edit', $user['User']['id'])); ?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a> 
                                            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_delete', $user['User']['id'])); ?>"  onclick="return confirm('Are you sure?')" class="btn btn-sm btn-default"> <i class="fa fa-remove"></i></a>
                                        </td>

                                    </tr>
    <?php
}
?>
                            </tbody>
                        </table>
                                <?php echo $this->Form->create('User', array('controller' => 'users', 'action' => 'sendmail')) ?>
<?php echo $this->Form->hidden('checkedvalues', array('id' => 'checks', 'value' => '')) ?>
                        <?php echo $this->Form->submit('Send Mail', array('class' => 'btn btn-primary', 'id' => 'buttonClass')); ?>
                        <?php $this->Form->end() ?>

                    </div>
                </div> <!-- /.table-responsive -->
            </div> <!-- /.portlet-content -->
        </div> <!-- /.portlet -->
    </div> <!-- /.col -->
</div> <!-- /.row -->

<script>

    /* if the page has been fully loaded we add two click handlers to the button */
    $(document).ready(function() {
        /* Get the checkboxes values based on the class attached to each check box */
        $("#buttonClass").click(function() {
            getValueUsingClass();
        });

        /* Get the checkboxes values based on the parent div id */
        $("#buttonParent").click(function() {
            getValueUsingParentTag();
        });


        $('#selecctall').click(function(event) {  //on click
            if (this.checked) { // check select status
                $('.chk').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                });
            } else {
                $('.chk').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                });
            }
        });




    });

    function getValueUsingClass() {
        /* declare an checkbox array */
        var chkArray = [];

        /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
        $(".chk:checked").each(function() {
            chkArray.push($(this).val());
            $('#checks').val(chkArray);
        });
    }

    function getValueUsingParentTag() {
        var chkArray = [];

        /* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
        $("#checkboxlist input:checked").each(function() {
            chkArray.push($(this).val());
        });

        /* we join the array separated by the comma */
        var selected;
        selected = chkArray.join(',') + ",";

        /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
        if (selected.length > 1) {
            alert("You have selected " + selected);
        } else {
            alert("Please at least one of the checkbox");
        }
    }

</script>