<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Edit Detail QC
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('detail_qc') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['id_detail_qc' => $detail_qc['id_detail_qc']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Substation_Name">Substation Name</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Substation_Name', $detail_qc['Substation_Name']); ?>" name="Substation_Name" id="Substation_Name" type="text" class="form-control" placeholder="Substation Name...">
                        <?= form_error('Substation_Name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Panel_No">Panel No</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Project_No', $detail_qc['Panel_No']); ?>" name="Panel_No" id="Panel_No" type="text" class="form-control" placeholder="Panel No...">
                        <?= form_error('Panel_No', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Panel_Name">Panel Name</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Project_No', $detail_qc['Panel_Name']); ?>" name="Panel_Name" id="Panel_Name" type="text" class="form-control" placeholder="Panel No...">
                        <?= form_error('Panel_Name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Panel_Type">Panel Type</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Panel_Type', $detail_qc['Panel_Type']); ?>" name="Panel_Type" id="Panel_Type" type="text" class="form-control" placeholder="Panel Type...">
                        <?= form_error('Panel_Type', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Panel_Received">Panel Received</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('Panel_Received', date('Y-m-d')); ?>" name="Panel_Received" id="Panel_Received" type="text" class="form-control date" placeholder="Panel Received...">
                        <?= form_error('Panel_Received', '<small class="text-danger">', '</small>'); ?>
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