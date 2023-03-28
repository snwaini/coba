<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('transaksi', 'Transaksi', 'required|in_list[barang_masuk,barang_keluar,barang_keluar_nominal]');
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Transaction Report";
            $this->template->load('templates/dashboard', 'laporan/form', $data);
        } else {
            $input = $this->input->post(null, true);
            $table = $input['transaksi'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = '';
            if ($table == 'barang_masuk') {
                $query = $this->admin->getBarangMasuk(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } elseif ($table == 'barang_keluar') {
                $query = $this->admin->getBarangKeluar(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } else {
                $query = $this->admin->getBarangKeluar(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            }

            $this->_cetak($query, $table, $tanggal);
        }
    }

    private function _cetak($data, $table_, $tanggal)
    {
        $this->load->library('CustomPDF');
        $table = $table_ == 'barang_masuk' ? 'Panel In' : 'Panel Out';

        $pdf = new FPDF();
        $pdf->AddPage('L', 'A4');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(190, 6, 'Report ' . $table, 0, 1, 'C');
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(190, 4, 'Date : ' . $tanggal, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 9);

        if ($table_ == 'barang_masuk') :
            $pdf->Cell(10, 6, 'No.', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Substation Name', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Panel No', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Panel Name', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Panel Type', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Date ', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Condition ', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Location ', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Request by QC ', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Actual Received from Engineering ', 1, 0, 'C');
            $pdf->Cell(20, 6, 'FRT ', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Function', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Closing NCR ', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Rechecking & Retesting ', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 6, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(20, 6, date('d-m-Y', strtotime($d['tanggal_masuk'])), 1, 0, 'C');
                $pdf->Cell(20, 6, $d['id_barang_masuk'], 1, 0, 'C');
                $pdf->Cell(20, 6, $d['nama_barang'], 1, 0, 'L');
                $pdf->Cell(20, 6, $d['nama_supplier'], 1, 0, 'L');
                $pdf->Cell(20, 6, $d['jumlah_masuk'] . ' ' . $d['nama_satuan'], 1, 0, 'C');
                $pdf->Ln();
            } 

        elseif ($table_ == 'barang_keluar') :
            $pdf->Cell(20, 7, 'No', 1, 0, 'C');
            $pdf->Cell(28, 7, 'Out-Date', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Serial Number', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Goods Name', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Receiver', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Address', 1, 0, 'C');
            $pdf->Cell(20, 7, 'Total Qty', 1, 0, 'C');
            // $pdf->Cell(25, 7, 'Total', 1, 0, 'C');

            $pdf->Ln();

            $no = 1;
            $grandTotal = 0;
            foreach ($data as $d) {
                $grandTotal += $d['grand_total'];
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(20, 6, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(20, 6, date('d-m-Y', strtotime($d['tanggal_keluar'])), 1, 0, 'C');
                $pdf->Cell(20, 6, $d['id_barang_keluar'], 1, 0, 'C');
                $pdf->Cell(20, 6, $d['nama_barang'], 1, 0, 'L');
                $pdf->Cell(20, 6, $d['nama_penerima'], 1, 0, 'L');
                $pdf->Cell(20, 6, $d['alamat'], 1, 0, 'L');
                $pdf->Cell(20, 6, $d['jumlah_keluar'] . ' ' . $d['nama_satuan'], 1, 0, 'C');
                // $pdf->Cell(25, 7, '$'.number_format($d['grand_total'],0,',','.'), 1, 0, 'L');

                $pdf->Ln();
                
            } 
        else :
            $pdf->Cell(7, 7, '#', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Out-Date', 1, 0, 'C');
            $pdf->Cell(20, 6, 'ID', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Goods Name', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Receiver', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Address', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Qty', 1, 0, 'C');
            $pdf->Cell(20, 6, 'Total', 1, 0, 'C');

            $pdf->Ln();

            $no = 1;
            $grandTotal = 0;
            foreach ($data as $d) {
                $grandTotal += $d['grand_total'];
                $pdf->SetFont('Arial', '', 8);
                $pdf->Cell(7, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(20, 6, date('d-m-Y', strtotime($d['tanggal_keluar'])), 1, 0, 'C');
                $pdf->Cell(20, 6, $d['id_barang_keluar'], 1, 0, 'C');
                $pdf->Cell(20, 6, $d['nama_barang'], 1, 0, 'L');
                $pdf->Cell(20, 6, $d['nama_penerima'], 1, 0, 'L');
                $pdf->Cell(20, 6, $d['alamat'], 1, 0, 'L');
                $pdf->Cell(20, 6, $d['jumlah_keluar'] . ' ' . $d['nama_satuan'], 1, 0, 'C');
                $pdf->Cell(20, 6, '$'.number_format($d['grand_total'],0,',','.'), 1, 0, 'L');

                $pdf->Ln();
                
            }
                $pdf->Cell(20, 6, 'GRAND TOTAL', 1, 0, 'C');
                $pdf->Cell(20, 6, '$'.number_format($grandTotal,0,',','.'), 1, 0, 'L');
                $pdf->Ln();
        endif;

        $file_name = $table . ' ' . $tanggal;
        $pdf->Output('I', $file_name);
    }
}
