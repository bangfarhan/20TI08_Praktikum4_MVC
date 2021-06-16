<?php
defined('BASEPATH') OR exit('Nodirectscriptaccessallowed');

class Bmi extends CI_Controller {

    public function index() {

        //Pasien
        $this->load->model('pasien_model','pasien1');
        $this->pasien1->id = 1;
        $this->pasien1->kode = '010001';
        $this->pasien1->nama = 'Faiz Fikri';
        $this->pasien1->gender = 'L';

        $this->load->model('pasien_model','pasien2');
        $this->pasien2->id=2;
        $this->pasien2->kode='020001';
        $this->pasien2->nama='Pandan Wangi';
        $this->pasien2->gender='P';

        $this->load->model('pasien_model','pasien3');
        $this->pasien3->id=3;
        $this->pasien3->kode='030001';
        $this->pasien3->nama='Bruno Junior';
        $this->pasien3->gender='L';
        
        $list_pasien = [$this->pasien1, $this->pasien2, $this->pasien3];

        //BMI
        $this->load->model('bmi_model', 'bmi1');
        $this->bmi1->berat = 45;
        $this->bmi1->tinggi = 175.4;
        $this->bmi1->nilaiBMI();
        $this->bmi1->statusBMI();

        $this->load->model('bmi_model', 'bmi2');
        $this->bmi2->berat = 65;
        $this->bmi2->tinggi = 155.4;
        $this->bmi2->nilaiBMI();
        $this->bmi2->statusBMI();

        $this->load->model('bmi_model', 'bmi3');
        $this->bmi3->berat = 75;
        $this->bmi3->tinggi = 165.4;
        $this->bmi3->nilaiBMI();
        $this->bmi3->statusBMI();

        $list_bmi = [$this->bmi1, $this->bmi2, $this->bmi3];

        //BMI_Pasien
        $this->load->model('bmipasien_model', 'bmip1');
        $this->bmip1->id = 1;
        $this->bmip1->tanggal = '2012-05-12';
        $this->bmip1->bmi = $this->bmi1;
        $this->bmip1->pasien = $this->pasien1;

        $this->load->model('bmipasien_model', 'bmip2');
        $this->bmip2->id = 2;
        $this->bmip2->tanggal = '2013-06-30';
        $this->bmip2->bmi = $this->bmi2;
        $this->bmip2->pasien = $this->pasien2;

        $this->load->model('bmipasien_model', 'bmip3');
        $this->bmip3->id = 3;
        $this->bmip3->tanggal = '2015-11-02';
        $this->bmip3->bmi = $this->bmi3;
        $this->bmip3->pasien = $this->pasien3;

        $list_bmipasien = [$this->bmip1, $this->bmip2, $this->bmip3];
        $data['list_bmipasien'] = $list_bmipasien;

        $this->load->view('bmi/index.php', $data);

    }
    
}