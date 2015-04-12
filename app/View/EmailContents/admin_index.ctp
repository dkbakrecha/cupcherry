<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-header">
                <h3>
                    <i class="fa fa-envelope-o"></i>
                    Email Contents
                </h3>
                <ul class="portlet-tools pull-right">
                    <li>
                        <a class="btn btn-sm btn-default" href="<?php echo $this->Html->url(array('controller' => 'email_contents', 'action' => 'mail')); ?>">
                            Compose Mail
                        </a>
                    </li>
                </ul>
            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           
                
                <table id="email_content_table" class="table display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

            </div> <!-- /.portlet-content -->
        </div> <!-- /.portlet -->
    </div> <!-- /.col -->
</div> <!-- /.row -->

<script>
    $(document).ready(function() {
        $('#email_content_table').dataTable({
            "processing": true,
            "ajax": "<?php echo $this->Html->url(array('controller' => 'email_contents', 'action' => 'email_tblData')); ?>"
        });
    });
</script>