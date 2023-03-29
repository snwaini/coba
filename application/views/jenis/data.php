<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Project Information
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('jenis/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Add Project Information
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>No </th>
                    <th>Project Year</th>
                    <th>Project No</th>
                    <th>Project Name</th>
                    <th>Customer</th>
                    <th>End User</th>
                    <th>Project Management</th>
                    <th>Panel Vendor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($jenis) :
                    foreach ($jenis as $j) :
                        ?>
                        <tr onclick="window.location='detail_qc/detail/<?php echo $j['id_jenis']; ?>'" style="cursor: pointer;">
                            <td><?= $no++; ?></td>
                            <td><?= $j['Project_Year']; ?></td>
                            <td><?= $j['Project_No']; ?></td>
                            <td><?= $j['nama_jenis']; ?></td>
                            <td><?= $j['Customer']; ?></td>
                            <td><?= $j['End_User']; ?></td>
                            <td><?= $j['Project_Management']; ?></td>
                            <td><?= $j['Panel_Vendor']; ?></td>
                            <td>
                                <a href="<?= base_url('jenis/edit/') . $j['id_jenis'] ?>" class="btn btn-info btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('jenis/delete/') . $j['id_jenis'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            Blank Data
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>