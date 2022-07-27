<?php 

Class Home extends Controller
{

	public function index()
	{
		//pagination formula
		$limit = 10;
		$offset = Page::get_offset($limit);

		$search = false;
		if(isset($_GET['search'])){
			
			$search = true;
		}
 
		//check if its a search
		if(isset($_GET['find']))
		{
			$find = addslashes($_GET['find']);
			$search = true;
		}
		
		$User = $this->load_model('User');
		$image_class = $this->load_model('Image');
		$user_data = $User->check_login();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

		$DB = Database::newInstance();
		$data['page_title'] = "Home";

		//read main posts
		if($search){

			if(isset($_GET['find']))
			{
				$arr['description'] = "%". $find . "%";
				$ROWS = $DB->read("select * from products where description like :description  limit $limit offset $offset ",$arr);
			}else{
				
				//advanced search
				//generate a search query
				$query = Search::make_query($_GET,$limit,$offset);
				$ROWS = $DB->read($query);
			}
		}else{
			$ROWS = $DB->read("select * from products limit $limit offset $offset ");
		}


		if($ROWS){
			foreach ($ROWS as $key => $row) {
				# code...
				$ROWS[$key]->image = $image_class->get_thumb_post($ROWS[$key]->image);
			}
		}

		$data['ROWS'] = $ROWS;

		//carousel posts
		$carousel_pages_count = 3;
		for ($i=0; $i < $carousel_pages_count; $i++) { 
			
			$Slider_ROWS[$i] = $DB->read("select * from products where rand() limit 3");
			if($Slider_ROWS[$i]){
				foreach ($Slider_ROWS[$i] as $key => $row) {
					# code...
					$Slider_ROWS[$i][$key]->image = $image_class->get_thumb_post($Slider_ROWS[$i][$key]->image);
				}
			}
			$data['Slider_ROWS'][] = $Slider_ROWS[$i];
			
		}

		//get all categories
		$category = $this->load_model('category');
		$data['categories'] = $category->get_all();


		//get products for lower segment
		$data['segment_data'] = $this->get_segment_data($DB,$data['categories'],$image_class);

		//get all slider content
		$Slider = $this->load_model('Slider');
		$data['slider'] = $Slider->get_all();

		if($data['slider']){
			foreach ($data['slider'] as $key => $row) {
				# code...
				$data['slider'][$key]->image = $image_class->get_thumb_post($data['slider'][$key]->image,484,441);
			}
		}
		
		$data['show_search'] = true;
		$this->view("index",$data);
	}

	private function get_segment_data($DB,$categories,$image_class)
	{

		$results = array();
		$mycats = array();
		$num = 0;
		foreach ($categories as $cat) {
			// code...

			$arr['id'] = $cat->id;
			$ROWS = $DB->read("select * from products where category = :id order by rand() limit 5",$arr);
			if(is_array($ROWS))
			{

				$cat->category = str_replace(" ", "_", $cat->category);
				$cat->category = preg_replace("/\W+/", "", $cat->category);

				//crop images
				foreach ($ROWS as $key => $row) {
					# code...
					$ROWS[$key]->image = $image_class->get_thumb_post($ROWS[$key]->image);
				}

				$results[$cat->category] = $ROWS;

				$num++;
				if($num > 5){
					break;
				}

			}
		}
		

		return $results;
	}

	public function thanks()
	{
		$data['page_title'] = "Thanks";
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
 			
			$user = $this->load_model("User");
			
		}

		$this->view("thanks",$data);
	}

	public function signup()
	{

		$data['page_title'] = "Signup";

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
 			
			$user = $this->load_model("User");
			$user->signup($_POST);
		}

		$this->view("signup",$data);
	}

	public function logout()
	{
		
		$User = $this->load_model('User');
 		$User->logout();
 		
	}

	public function login()
	{
		$data['page_title'] = "Login";
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
 			
			$user = $this->load_model("User");
			$user->login($_POST);
		}

		$this->view("login",$data);
	}

	// public function contact_us()
	// {
	 
	// 	$User = $this->load_model('User');
	// 	$Message = $this->load_model('Message');
 	// 	$user_data = $User->check_login();

	// 	if(is_object($user_data)){
	// 		$data['user_data'] = $user_data;
	// 	}

	// 	$DB = Database::newInstance();
 
 	// 	$data['errors'] = array();
 	// 	if(count($_POST) > 0){

 	// 		$data['POST'] = $_POST;
 	// 		$data['errors'] = $Message->create($_POST);

 	// 		if(!is_array($data['errors']) && $data['errors']){
 	// 			redirect("contact_us?success=true");
 	// 		}
 	// 	}

	// 	$data['page_title'] = "Contact-us";
 
		
 	// 	$this->view("contact",$data);
	// }

	public function cart()
	{
		
		$User = $this->load_model('User');
		$image_class = $this->load_model('Image');
		$user_data = $User->check_login();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

		$DB = Database::newInstance();
		$ROWS = false;
		$prod_ids = array();
		
		if(isset($_SESSION['CART'])){

			$prod_ids = array_column($_SESSION['CART'], 'id');
			$ids_str = "'" . implode("','", $prod_ids) . "'";

			$ROWS = $DB->read("select * from products where id in ($ids_str)");
		}
 
		if(is_array($ROWS)){
			foreach ($ROWS as $key => $row) {
				# code...

				foreach ($_SESSION['CART'] as $item) {
					# code...
					if($row->id == $item['id']){
						$ROWS[$key]->cart_qty = $item['qty'];
						break;
					}
				}
				
			}
		}


		$data['page_title'] = "Cart";
		$data['sub_total'] = 0;

		if($ROWS){
			foreach ($ROWS as $key => $row) {
				# code...
				$ROWS[$key]->image = $image_class->get_thumb_post($ROWS[$key]->image);
				$mytotal = $row->price * $row->cart_qty;

				$data['sub_total'] += $mytotal;
			}
		}

		if(is_array($ROWS)){
			rsort($ROWS);
		}
		
		$data['ROWS'] = $ROWS;

		$this->view("cart",$data);
	}

	public function product_details($slag)
	{
		$slag = esc($slag);

		$User = $this->load_model('User');
		$user_data = $User->check_login();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

		$DB = Database::newInstance();

		$ROW = $DB->read("select * from products where slag = :slag",['slag'=>$slag]);

		$data['page_title'] = "Product Details";
		$data['ROW'] = is_array($ROW) ? $ROW[0] : false;

		$this->view("product-details",$data);
	}

}