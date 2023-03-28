<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Edit Project Information
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('jenis') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Back
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['id_jenis' => $jenis['id_jenis']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Project_Year">Project Year</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Project_Year', $jenis['Project_Year']); ?>" name="Project_Year" id="Project_Year" type="text" class="form-control" placeholder="Project Year...">
                        <?= form_error('Project_Year', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Project_No">Project No</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Project_No', $jenis['Project_No']); ?>" name="Project_No" id="Project_No" type="text" class="form-control" placeholder="Project No...">
                        <?= form_error('Project_No', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_jenis">Project Name</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_jenis', $jenis['nama_jenis']); ?>" name="nama_jenis" id="nama_jenis" type="text" class="form-control" placeholder="Project Name...">
                        <?= form_error('nama_jenis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Customer">Customer</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Customer', $jenis['Customer']); ?>" name="Customer" id="Customer" type="text" class="form-control" placeholder="Customer...">
                        <?= form_error('Customer', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="End_User">End User</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('End_User', $jenis['End_User']); ?>" name="End_User" id="End_User" type="text" class="form-control" placeholder="End User...">
                        <?= form_error('End_User', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Project_Management">Project Management</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Project_Management', $jenis['Project_Management']); ?>" name="Project_Management" id="Project_Management" type="text" class="form-control" placeholder="Project Management...">
                        <?= form_error('Project_Management', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Panel_Vendor">Panel Vendor</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Panel_Vendor', $jenis['Panel_Vendor']); ?>" name="Panel_Vendor" id="Panel_Vendor" type="text" class="form-control" placeholder="Panel Vendor...">
                        <?= form_error('Panel_Vendor', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>