<?php
//prd($stuList);
echo $this->Html->css('plus/jquery.dataTables');
echo $this->Html->script('plus/jquery.dataTables.min');
?>

<div class="row">
    <div class="col-md-12">
        <div class="widget-header">
            <i class="icon-group"></i>
            <h3>Students</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <div>

                <div class="col-md-8">
                    <div class="col-md-10">
                        <?php
                        echo $this->Form->create('Student', array(
                            'class' => 'form-horizontal', 'url' => array(
                                'plus' => true, 'controller' => 'students', 'action' => 'index'
                            )
                        ));
                        //echo $this->Form->hidden('type_value',array('value'=>''));
                        ?>
                        <div class="form-group">			

                            <label class="control-label" for="firstname">Select Standard</label>
                            <div class="controls">
                                <?php
                                $options = array();
                                foreach ($standards as $standard) {
                                    $options[$standard['Standard']['id']] = $standard['Standard']['title'];
                                }
                                echo $this->Form->input('standard_id', array(
                                    'class' => 'form-control',
                                    'div' => false,
                                    'label' => false,
                                    'empty' => 'Select',
                                    'required' => 'required',
                                    'options' => $options));
                                ?>
                            </div>
                        </div>



                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <?php
                            echo $this->Form->submit('Go', array('class' => 'btn btn-primary'));
                            echo $this->Form->end();
                            ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <a href="<?php
                    echo $this->Html->url(array(
                        'plus' => true, 'controller' => 'students', 'action' => 'add'
                    ))
                    ?>" class="btn btn-primary pull-right">Add New</a>

                </div>

            </div>
           
            <div class="col-md-12">
                 <hr>
                <?php
                if (isset($stuList) && !empty($stuList)) {
                    ?>
                    <div class="col-md-12">
                        <table class="table" id="example">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Standard</th>
                            <th>Contact</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($stuList as $list) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php
                                            echo
                                            $this->Form->postLink($list['StudentProfile']['fname'] . ' ' . $list['StudentProfile']['lname'], array('controller' => 'students', 'action' => 'edit', $list['StudentProfile']['id']));
                                            ?></td>
                                        <td><?php echo $list['Standard']['title']; ?></td>
                                        <td><?php echo $list['StudentProfile']['contact_number']; ?></td>
                                        <td><?php echo $list['StudentProfile']['contact_number']; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>



                    </div>
                    <?php
                }
                ?>

            </div>



        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        var myTable = $('#example').dataTable({
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [4]
                },
            ],
            "order": [[0, 'asc']],
        });




        $('#StudentProfileTypeId').change(function() {
            var selectedType;
            selectedType = $('#StudentProfileTypeId option:selected').val();
            $('#StudentProfileTypeValue').val(selectedType);
            //alert(selectedType);
        });

    });
</script>