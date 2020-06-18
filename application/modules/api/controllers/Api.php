<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api extends CI_Controller{
// constructor
  public function __construct(){
    parent::__construct();
  }

  public function apipublic()
  {
      $data['title'] = 'API';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      $data['apilist'] = $this->db->get('m_apilist')->result_array();

          $this->load->view('themes/backend/header', $data);
          $this->load->view('themes/backend/sidebar', $data);
          $this->load->view('themes/backend/topbar', $data);
          $this->load->view('apipublic', $data);
          $this->load->view('themes/backend/footer');
          $this->load->view('themes/backend/footerajax');
      
  }
  public function memberdetail()
    {
      $member_id=$_GET['member_id'];  
      $this->db->select('`pp_member`.member_id,`pp_member`.nama,`pp_member`.member_address,`pp_member`.member_hp,`pp_member`.inst_name,`pp_member_type`.nama as member_type');
      $this->db->from('pp_member');
      $this->db->join('pp_member_type', 'pp_member_type.id = pp_member.member_type_id');
      $this->db->where('pp_member.member_id',$member_id);
      $query = $this->db->get()->row_array();
      echo json_encode($query);
    }
    public function memberloan()
    {
      $member_id=$_GET['member_id'];  
      $this->db->select('`pp_loan`.member_id,pp_member.nama as nama_member,`pp_loan`.loan_date as tgl_pinjam,`pp_loan`.due_date as tgl_kembali,`pp_loan`.item_kode as item_kode,`pp_item`.buku_id,`pp_buku`.judul');
      $this->db->from('pp_loan');
      $this->db->join('pp_member', 'pp_member.member_id = pp_loan.member_id');
      $this->db->join('pp_item', 'pp_item.item_kode = pp_loan.item_kode');
      $this->db->join('pp_buku', 'pp_buku.id = pp_item.buku_id');
      $this->db->where('pp_loan.member_id',$member_id);
      $this->db->where('pp_loan.is_return','0');
      $query = $this->db->get()->row_array();
      echo json_encode($query);
    }
    public function memberfines()
    {
      $member_id=$_GET['member_id'];  
      $this->db->select('`pp_fines`.member_id,`pp_fines`.fines_date as tgldenda,`pp_fines`.debet as jumlahdenda,`pp_fines`.description as keterangan');
      $this->db->from('pp_fines');
      $this->db->where('pp_fines.member_id',$member_id);
      $this->db->where('pp_fines.credit','0');
      $query = $this->db->get()->row_array();
      echo json_encode($query);
    }



 //END
}
?>