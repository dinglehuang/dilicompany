<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	private function view_common(){
		//联系我们
		$this->db->select('title,content');
		$this->db->where('key','contact_us');
		$query = $this->db->get("dili_u_m_page_data",1,0);
		$contact_us = $query->result();
		$this->smarty->assign('contact_us',$contact_us[0]);
		$this->smarty->view('common.html');
	}
	
	
	public function __construct(){
		parent::__construct();
		$this->smarty->assign('base_url',base_url());
		$this->smarty->assign('site_url',site_url());
	}
	public function index()
	{
		//公司简介内容
		$this->db->select('title,content');
		$this->db->where('key','company_des');
		$query = $this->db->get("dili_u_m_page_data",1,0);
		$company_des = $query->result();
		$this->smarty->assign('company_des',$company_des[0]);
			
		//首页新闻中心标题列表
		$this->db->select('id,title');
		$query = $this->db->get("dili_u_m_article",5,0);
		$news = $query->result();	
		$this->smarty->assign('news',$news);
		
		//联系我们
		$this->db->select('title,content');
		$this->db->where('key','contact_us');
		$query = $this->db->get("dili_u_m_page_data",1,0);
		$contact_us = $query->result();
		$this->smarty->assign('contact_us',$contact_us[0]);
		$this->smarty->view('welcome.html');
	}
	public function intro(){
		
		//main_data
		$this->db->select('title,content');
		$this->db->where('key','intro');
		$query = $this->db->get("dili_u_m_cate_content",1,0);
		$intro = $query->result();
		$this->smarty->assign('main_data',$intro[0]);
		
		$this->view_common();
		
	}
	

	public function news_detail(){
		$id = $this->uri->segment(3);
		//首页新闻中心标题列表
		$this->db->select('title,content');
		$query = $this->db->get("dili_u_m_article",1,0);
		$news = $query->result();
		$this->smarty->assign('new',$news[0]);
		//$this->view_common();
	}

	public function join(){
		//main_data
		$this->db->select('title,content');
		$this->db->where('key','join');
		$query = $this->db->get("dili_u_m_cate_content",1,0);
		$join = $query->result();
		$this->smarty->assign('main_data',$join[0]);
		
		$this->view_common();
		
	} 
	public function contact(){
		//main_data
		$this->db->select('title,content');
		$this->db->where('key','contact');
		$query = $this->db->get("dili_u_m_cate_content",1,0);
		$contact = $query->result();
		$this->smarty->assign('main_data',$contact[0]);
		
		$this->view_common();
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
