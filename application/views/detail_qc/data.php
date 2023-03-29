<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Detail QC <?php echo($nama); ?>
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('detail_qc/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Add Detail QC
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
                    <th>Substation Name</th>
                    <th>Panel No</th>
                    <th>Panel Name</th>
                    <th>Panel Type</th>
                    <th>Date Panel Received</th>
                    <th>Location</th>
                    <th>Date Request Drawing</th>
                    <th>Date Actual Drawing</th>
                    <th>FRT</th>
                    <th>Closing NCR</th>
                    <th>Recheking</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($detail_qc) :
                    foreach ($detail_qc as $dqc) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dqc['Substation_Name']; ?></td>
                            <td><?= $dqc['Panel_No']; ?></td>
                            <td><?= $dqc['Panel_Name']; ?></td>
                            <td><?= $dqc['Panel_Type']; ?></td>
                            <td><?= $dqc['Panel_Received']; ?></td>
                            <td><?= $dqc['Location']; ?></td>
                            <td><?= $dqc['Drawing_Date']; ?></td>
                            <td><?= $dqc['Actual_Date']; ?></td>
                            <td><?= $dqc['FRT']; ?></td>
                            <td><?= $dqc['Closing_NCR']; ?></td>
                            <td><?= $dqc['Recheking']; ?></td>
                            <td>
                                <a href="<?= base_url('detail_qc/edit/') . $dqc['id_detail_qc'] ?>" class="btn btn-info btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('detail_qc/delete/') . $dqc['id_detail_qc'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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