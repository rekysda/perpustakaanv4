<?php
error_reporting(0);
defined('BASEPATH') or exit('No direct script access allowed');

class Keanggotaan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_maintenance();
    is_logged_in();
  }

  // tipeanggota
  public function tipeanggota()
  {
    $data['title'] = 'Tipe Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Keanggotaan_model', 'Keanggotaan_model');
    $data['tipeanggota'] = $this->Keanggotaan_model->get_tipeanggota();
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('tipeanggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
 
  }
  public function tambahtipeanggota()
  {
    $data['title'] = 'Tipe Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Keanggotaan_model', 'Keanggotaan_model');
 
    $this->form_validation->set_rules('nama', 'nama', 'required|is_unique[pp_member_type.nama]');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('tambahtipeanggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
        $data = [
          'nama' => $this->input->post('nama'),
          'loan_limit' => $this->input->post('loan_limit'),
          'loan_periode' => $this->input->post('loan_periode'),
          'reborrow_limit' => $this->input->post('reborrow_limit'),
          'fine_each_day' => $this->input->post('fine_each_day'),
           ];
           $this->db->insert('pp_member_type', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('keanggotaan/tipeanggota');
    }
  }

  //edit_tipeanggota
 public function edit_tipeanggota($id)
 {
   $data['title'] = 'Tipe Anggota';
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();
   $this->load->model('Keanggotaan_model', 'Keanggotaan_model');
   $data['get_tipeanggota'] = $this->Keanggotaan_model->get_tipeanggota_ById($id);
   $this->form_validation->set_rules('nama', 'nama', 'required');
   if ($this->form_validation->run() == false) {
   $this->load->view('themes/backend/header', $data);
   $this->load->view('themes/backend/sidebar', $data);
   $this->load->view('themes/backend/topbar', $data);
   $this->load->view('edit_tipeanggota', $data);
   $this->load->view('themes/backend/footer');
   $this->load->view('themes/backend/footerajax');
   }else{
  
      $dataitem = [
        'nama' => $this->input->post('nama'),
        'loan_limit' => $this->input->post('loan_limit'),
        'loan_periode' => $this->input->post('loan_periode'),
        'reborrow_limit' => $this->input->post('reborrow_limit'),
        'fine_each_day' => $this->input->post('fine_each_day'),
        ];  
        $this->db->where('id', $id);
          $this->db->update('pp_member_type', $dataitem);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
         redirect('keanggotaan/tipeanggota');
   }
 }
  public function hapus_tipeanggota()
  {
   $pcheck = $this->input->post('check');
   
 foreach($pcheck as $id) {
   $dataitem = $this->db->get_where('pp_member_type', ['id' =>
     $id ])->row_array();
     $this->db->where('id', $id);
   $this->db->delete('pp_member_type');
 }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('keanggotaan/tipeanggota');
  }

//anggota
  public function anggota()
  {
    $data['title'] = 'Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Keanggotaan_model', 'Keanggotaan_model');
    $data['anggota'] = $this->Keanggotaan_model->get_anggota();
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('themes/backend/javascript', $data);
    $this->load->view('anggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
 
  }
  public function tambahanggota()
  {
    $data['title'] = 'Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Keanggotaan_model', 'Keanggotaan_model');
    $data['list_member_type'] = $this->Keanggotaan_model->get_tipeanggota();

    $this->form_validation->set_rules('member_id', 'member_id', 'required|is_unique[pp_member.member_id]');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('gender', 'gender','required');
    $this->form_validation->set_rules('member_type_id', 'member_type_id');
    $this->form_validation->set_rules('member_email', 'member_email');
    $this->form_validation->set_rules('member_address', 'member_address');
    $this->form_validation->set_rules('member_hp', 'member_hp');
    $this->form_validation->set_rules('inst_name', 'inst_name');
    $this->form_validation->set_rules('mpassword', 'mpassword');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('tambahanggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{
      // Jika Ada Gambar
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size']     = '200';
          $config['upload_path'] = './assets/images/member/';
          $config['file_name'] = date('dmyHis');
          $this->load->library('upload', $config);
          if ($this->upload->do_upload('image')) {
              $new_image = $this->upload->data('file_name');
          } else {
              echo  $this->upload->display_errors();
          }
      }

        $data = [
          'member_id' => $this->input->post('member_id'),
          'nama' => $this->input->post('nama'),
          'gender' => $this->input->post('gender'),
          'member_type_id' => $this->input->post('member_type_id'),
          'member_email' => $this->input->post('member_email'),
          'member_address' => $this->input->post('member_address'),
          'member_hp' => $this->input->post('member_hp'),
          'inst_name' => $this->input->post('inst_name'),
          'mpassword' => md5($this->input->post('mpassword')),
          'is_active' => $this->input->post('is_active'),
          'member_image' => $new_image,
           ];
           $this->db->insert('pp_member', $data);
           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('keanggotaan/anggota');
    }
  }
  public function edit_anggota($id)
  {
    $data['title'] = 'Anggota';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $this->load->model('Keanggotaan_model', 'Keanggotaan_model');
    $data['list_member_type'] = $this->Keanggotaan_model->get_tipeanggota();
    $data['get_anggota'] = $this->Keanggotaan_model->get_anggota_ById($id);

    $this->form_validation->set_rules('member_id', 'member_id', 'required');
    $this->form_validation->set_rules('nama', 'nama', 'required');
    $this->form_validation->set_rules('gender', 'gender','required');
    $this->form_validation->set_rules('member_type_id', 'member_type_id');
    $this->form_validation->set_rules('member_address', 'member_address');
    $this->form_validation->set_rules('member_hp', 'member_hp');
    $this->form_validation->set_rules('inst_name', 'inst_name');
    $this->form_validation->set_rules('mpassword', 'mpassword');
    if ($this->form_validation->run() == false) {
    $this->load->view('themes/backend/header', $data);
    $this->load->view('themes/backend/sidebar', $data);
    $this->load->view('themes/backend/topbar', $data);
    $this->load->view('edit_anggota', $data);
    $this->load->view('themes/backend/footer');
    $this->load->view('themes/backend/footerajax');
    }else{

        $dataitem = [
          'member_id' => $this->input->post('member_id'),
          'nama' => $this->input->post('nama'),
          'gender' => $this->input->post('gender'),
          'member_type_id' => $this->input->post('member_type_id'),
          'member_email' => $this->input->post('member_email'),
          'member_address' => $this->input->post('member_address'),
          'member_hp' => $this->input->post('member_hp'),
          'inst_name' => $this->input->post('inst_name'),
          'is_active' => $this->input->post('is_active'),
           ];
           $this->db->where('id', $id);
           $this->db->update('pp_member', $dataitem);
           $mpassword = $this->input->post('mpassword');
           if ($mpassword) {
            $this->db->set('mpassword', md5($mpassword));
            $this->db->where('id', $id);
            $this->db->update('pp_member');
          }
          // Jika Ada Gambar
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
       $datamember = $this->db->get_where('pp_member', ['id' =>
       $id ])->row_array();
       $member_image = $datamember['member_image'];
       unlink(FCPATH . 'assets/images/member/' . $member_image);

          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size']     = '200';
          $config['upload_path'] = './assets/images/member/';
          $config['file_name'] = date('dmyHis');
          $this->load->library('upload', $config);
          if ($this->upload->do_upload('image')) {
              $new_image = $this->upload->data('file_name');
              $this->db->set('member_image', $new_image);
              $this->db->where('id', $id);
              $this->db->update('pp_member');
          } else {
              echo  $this->upload->display_errors();
          }
      }

           $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Saved !</div>');
           redirect('keanggotaan/anggota');
    }
  }
  public function hapus_anggota()
  {
   $pcheck = $this->input->post('check');
   
 foreach($pcheck as $id) {
   $dataitem = $this->db->get_where('pp_member', ['id' =>
     $id ])->row_array();
     $this->db->where('id', $id);
   $this->db->delete('pp_member');
 }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
    redirect('keanggotaan/anggota');
  }

  
// Export anggota in CSV format 
public function exportanggota_csv(){ 
  // file name 
  $tanggalskrg=date('Ymd');
  $this->load->dbutil();
  $this->load->helper('download');
  $this->db->select('*');
  $this->db->from('pp_member');
  $member_data = $this->db->get();
  $delimiter = ",";
  $newline = "\r\n";
  $enclosure = '';
  $data = $this->dbutil->csv_from_result($member_data, $delimiter, $newline, $enclosure);
  $namefile = 'Data_Member' . $tanggalskrg . '.csv';

  force_download($namefile, $data);
  $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data Exported !</div>');
  redirect('keanggotaan/anggota');
 }
 public function importanggotacsv()
 {
   $data['user'] = $this->db->get_where('user', ['email' =>
   $this->session->userdata('email')])->row_array();


   $file = $_FILES['anggotacsv']['tmp_name'];
   $demileter = $this->input->post('demileter');
   // Medapatkan ekstensi file csv yang akan diimport.
   $ekstensi  = explode('.', $_FILES['anggotacsv']['name']);

   // Tampilkan peringatan jika submit tanpa memilih menambahkan file.

   if (empty($file)) {
     $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">File tidak boleh kosong!</div>');
     redirect('keanggotaan/anggota');
   } else {
     // Validasi apakah file yang diupload benar-benar file csv.
     if (strtolower(end($ekstensi)) == 'csv' && $_FILES["anggotacsv"]["size"] > 0) {

       $i = 0;
       $handle = fopen($file, "r");
       $sukses = '0';
       while (($row = fgetcsv($handle, 2048))) {
         $i++;
         if ($i == 1) continue;
         // Data yang akan disimpan ke dalam databse
         //$this->db->where('siswa_id', $siswa_id);
         //$this->db->delete('siswa_spp');
         $dataraw =  $row[0];
         $arr = explode(",", $dataraw);
         $id =  $arr[0];
         $member_id =  $arr[1];
         $nama =  $arr[2];
         $gender =  $arr[3];
         $member_type_id   =  $arr[4];
         $member_email   =  $arr[5];
         $member_address   =  $arr[6];
         $member_hp   =  $arr[7];
         $inst_name   =  $arr[8];
         $mpassword   =  $arr[9];
         $member_image =  $arr[10];
         $last_update =  $arr[11];
         if ($id <> '') {

           $data = [
             'id' => $id,
             'member_id' => $member_id,
             'nama' => strip_quotes($nama),
             'gender' => strip_quotes($gender),
             'member_type_id' => strip_quotes($member_type_id),
             'member_email' => strip_quotes($member_email),
             'member_address' => strip_quotes($member_address),
             'member_hp' => strip_quotes($member_hp),
             'inst_name' => strip_quotes($inst_name),
             'mpassword' => strip_quotes($mpassword),
             'member_image' => strip_quotes($member_image),
           ];

           // Simpan data ke database.
           $this->db->replace('pp_member', $data);

           $sukses++;
         }
       }
       fclose($handle);

       $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Import Data ' . $sukses . ' Successed !</div>');
       redirect('keanggotaan/anggota');
     } else {
       $this->session->set_flashdata('message', '<div class="alert alert-danger" role"alert">Format file tidak valid!</div>');
       redirect('keanggotaan/anggota');
     }
   }
 }
 public function hapus_gambarmember($id)
 {
  $databuku = $this->db->get_where('pp_member', ['id' =>
		$id ])->row_array();
    $member_image = $databuku['member_image'];
    unlink(FCPATH . 'assets/images/member/' . $member_image);
  
    $this->db->set('member_image', '');
    $this->db->where('id', $id);
    $this->db->update('pp_member');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role"alert">Data deleted !</div>');
   redirect('keanggotaan/edit_anggota/'.$id);
 }
  //end
}