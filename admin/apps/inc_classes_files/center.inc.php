<?php 
require_once("apps/initialize.php"); 
$sanitize = true;

class my_co_class {

 public function setPageUrl()
  	{
		$url_link = isset($_GET['actionID']) ? $_GET['actionID'] : 'nothing_yet';
		return $u_link = urlencode($url_link);
	}

 public function setPage($headery)
   {
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/pages/".$this->headery."");
   }
   
    public function set_gallery($headery)
    {
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/slider/".$this->headery."");
    }
    
    public function set_contactUs($headery)
    {
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/contactUs/".$this->headery."");
    }
	
	public function set_career($headery)
    {
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/career/".$this->headery."");
    }
	
	public function team_member($headery)
    {
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/team/".$this->headery."");
    }
   
	public function servicesAtr($headery)
	{
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/services/".$this->headery."");
	}
	
	public function processAtr($headery)
	{
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/ourProcess/".$this->headery."");
	}
	
	
	public function categoryList($headery)
	{
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/category/".$this->headery."");
	}
	
	public function portfolioList($headery)
	{
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/portfolio/".$this->headery."");
	}

	public function settings($headery)
	{
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/settings/".$this->headery."");
	}


   public function set_customer($headery)
    {
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/members/".$this->headery."");
    }
	
	public function allBlog($headery)
   {
	$this->headery = $headery;
	global $mysqli; 
	include_once(PRIVATE_PATH . "/blog/".$this->headery."");
   }


   
   
}

$obj = new my_co_class();

if ($obj->setPageUrl() == 'dashboard')
	{
		$obj->setPage("dashboard.inc.php");
	}
	
// Category 

if ($obj->setPageUrl() == 'categories')
	{
	$obj->categoryList("category_list.php");
	}
	
if ($obj->setPageUrl() == 'portfolio')
	{
	$obj->portfolioList("portfolio_list.php");
	}
	
if ($obj->setPageUrl() == 'team')
	{
	$obj->team_member("team_member.php");
	}
	
	
	


// Services 
if ($obj->setPageUrl() == 'add_service')
	{
		$obj->servicesAtr("addService.php");
	}
if ($obj->setPageUrl() == 'all_services')
	{
		$obj->servicesAtr("service_list.php");
	}
if ($obj->setPageUrl() == 'update_service')
	{
		$obj->servicesAtr("update_service.php");
	}
	

// Our Process 
if ($obj->setPageUrl() == 'add_process')
	{
		$obj->processAtr("addProcess.php");
	}
if ($obj->setPageUrl() == 'all_process')
	{
		$obj->processAtr("process_list.php");
	}
if ($obj->setPageUrl() == 'update_process')
	{
		$obj->processAtr("update_process.php");
	}	
	
		

//Settings
if ($obj->setPageUrl() == 'website_setting')
	{
	$obj->settings("website_setting.php");
	}

	

//Blog
if ($obj->setPageUrl() == 'blog')
	{
		$obj->allBlog("blog_list.php");
	}
	
if ($obj->setPageUrl() == 'add_blog')
	{
		$obj->allBlog("add_blog.php");
	}
	
if ($obj->setPageUrl() == 'update_blog')
	{
		$obj->allBlog("update_blog.php");
	}
	
	
	
if ($obj->setPageUrl() == 'all_customer')
	{
		$obj->set_customer("all_members.inc.php");
	}	
	
	if ($obj->setPageUrl() == 'update_customer')
	{
		$obj->set_customer("clnt-up-sngl.inc.php");
	}	
if ($obj->setPageUrl() == 'sales_statement')
	{
		$obj->set_statement("sales_statement.inc.php");
	}
 
if ($obj->setPageUrl() == 'ref_bonus')
	{
		$obj->set_customer("all_bns_lst.inc.php");
	}	

// Gallery  Value
if ($obj->setPageUrl() == 'add_slide')
	{
		$obj->set_gallery("add_slide.php");
	}

if ($obj->setPageUrl() == 'slider')
	{
		$obj->set_gallery("all_slide.php");
	}

if ($obj->setPageUrl() == 'update_slide')
	{
		$obj->set_gallery("update_slide.php");
	}
	
	
	
//Customer  Value
if ($obj->setPageUrl() == 'all_pages')
	{
		$obj->setPage("all_pages.php");
	}
	
if ($obj->setPageUrl() == 'all_contactUs')
	{
		$obj->set_contactUs("all_contactUs.php");
	}
	
	if ($obj->setPageUrl() == 'all_career')
	{
		$obj->set_career("all_career.php");
	}

if ($obj->setPageUrl() == 'update_page')
	{
		$obj->setPage("update_page.php");
	}

if ($obj->setPageUrl() == 'view_all_retail_invoices')
	{
		$obj->set_order("view_all_invoices_retail.inc.php");
	}

if ($obj->setPageUrl() == 'view_all_pending_invoices')
	{
		$obj->set_order("view_all_pending_in.inc.php");
	}

if ($obj->setPageUrl() == 'view_all_completed_invoices')
	{
		$obj->set_order("view_al_compld_in.inc.php");
	}


	
// Settings  Value

if ($obj->setPageUrl() == 'edit_home_step_one')
	{
		$obj->set_setting("step_one_edit.php");
	}
	
if ($obj->setPageUrl() == 'update_home_position')
	{
		$obj->set_setting("edit_home.inc.php");
	}
	
if ($obj->setPageUrl() == 'social_networks')
	{
		$obj->set_setting("scl-setng.inc.php");
	}
	
if ($obj->setPageUrl() == 'currency')
	{
		$obj->set_setting("change_currency.php");
	}
	
	
if ($obj->setPageUrl() == 'update_position')
	{
		$obj->set_setting("update_position.php");
	}
	
		
// members  Value
if ($obj->setPageUrl() == 'add_new_person')
	{
		$obj->set_sales_person_create("new_sales_id.php");
	}

if ($obj->setPageUrl() == 'view_all_person')
	{
		$obj->set_sales_person_create("all_sales_id.php");
	}

	if ($obj->setPageUrl() == 'edit_profile')
	{
		$obj->set_customer("edit_profile.php");
	}	
	
if ($obj->setPageUrl() == 'change_company_details')
	{
		$obj->set_sting("update_company_info.inc.php");
	}
	
// End members  Value


unset($obj);

?>