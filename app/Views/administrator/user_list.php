<?=$this->extend('templates/index');?>
<?=$this->section('page');?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus user ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Hapus" untuk melanjutkan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?=base_url('logout')?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script type="text/javascript">
// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": [
            [0, 'asc']
        ],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo site_url('Administrator/data_user'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
});
</script>
<?=$this->endSection()?>