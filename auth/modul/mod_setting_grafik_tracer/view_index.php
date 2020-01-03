<!-- load data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- tooltip -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
        <nav class="navbar navbar-default" style="margin-bottom: 0px">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Informasi Pengaturan Grafik Tracer</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?module=<?php echo $this->module."&act=add&tahun={$_GET['tahun']}" ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a></li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar .navbar-default -->

        <div class="panel-body">
            <table class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $no= 1;
                        foreach ($rows as $key => $value) {
                            echo "
                                <tr>
                                    <td>{$no}</td>
                                    <td>{$value->title}</td>
                                    <td>
                                        <a href='?module={$this->module}&act=edit&id={$value->id}&tahun={$_GET['tahun']}'>
                                            <input type='image' src='images/icn_edit.png' title='Edit'>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <!--<a href='?module={$this->module}&act=hapus&id={$value->id}' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">
                                            <input type='image' src='images/icn_trash.png' title='Trash'>
                                        </a>-->
                                    </td>
                                </tr>
                            ";
                            $no++;
                        }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel .panel-primary -->
</div>
<!-- /.col -->

<script>
    $(document).ready(function() {
        $('table').DataTable()
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>