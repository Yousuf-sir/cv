<?php

require_once "Database.php";

class POST {

     /*
     * Database instanc
     */

    private $db;

    /*
    * Post $post_title
    *@void string
    */

    protected $post_title;

    /*
    * post_category
    *@void string
    */

    protected $post_subtitle;


    /*
    * post_subtitle
    *@void string
    */


    protected $post_category;

    /*
    * Post body
    *@void string
    */

    protected $post_body;

    /*
    * Post id
    *@void int
    */

    protected $post_id;

    /*
    * Post message error
    *@void  array;
    */

    protected $mgs = array ();

    /*
    * Post table
    *@void string
    */


    protected $table ='post';

    /*
    * Post class construct
    *@void run Database
    */

   public function __construct () {
   	$this->db = new Database ();
   }

   /*
   * Show Post details
   *@void string
   */

	public function postget (){
		$post   = "SELECT * FROM $this->table";
		$result = $this->db->select ( $post );
		return $result;
	}

  /*
  * Show Post edit
  *@void string
  */


  public function post_edit_info (){
    if (isset($_GET['postedit'])){

      $postedit = $_GET['postedit'];

      $postedt = "SELECT * FROM $this->table WHERE post_id = $postedit ";

  		$result = $this->db->select ( $postedt );
  		return $result;
    }
  }
  public function add_new_post ( $data ){

    $this->post_title     = ( $data['post_title'] );
    $this->post_subtitle  = ( $data['post_subtitle'] );
    $this->post_category  = ( $data['post_category'] );
    $this->post_body      = ( $data['post_body'] );
    //$this->about_id       = htmlentities( $data['about_id'] );

    if (empty ( $this->post_title ) || empty ( $this->post_subtitle ) || empty ( $this->post_category ) || empty ($this->post_body))
    {
      $this -> mgs[] = "Must be fill up empty field";
      return $this->mgs;
    }else if ( empty($data['post_id']) )
    {
      $postin = "INSERT INTO $this->table SET
                post_title     = '$this->post_title',
                post_subtitle  = '$this->post_subtitle',
                post_category  = '$this->post_category',
                post_body      = '$this->post_body'";
    $result  = $this->db->insert( $postin );
       if ( $result )
          {
            $this -> mgs[] = "Record save successfully";
            return $this->mgs;
          }else{
            $this -> mgs[] = "Record not saved, Try again.";
            return $this->mgs;
          }
    }else{
      $this->post_id = $data['post_id'];
      $datain = "UPDATE $this->table SET
                post_title     = '$this->post_title',
                post_subtitle  = '$this->post_subtitle',
                post_category  = '$this->post_category',
                post_body      = '$this->post_body'
                WHERE post_id = '$this->post_id' ";
      $result = $this->db->update( $datain );
      if ( $result )
      {

        $this->Redirect('http://localhost/protfolio/admin/', false);
        $this->mgs[] = "Record update successfully";
         return $this->mgs;

      }else{
        $this->mgs[] = "Record not updated, Tryagain please.";
        return $this->mgs;
      }
    }


  }


   public function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

  public function delete_post ( $data ){
    $action         = $data['action'];
    $this->post_id = $data['post_id'];

    if ($action != 'action'){
      $this->mgs[] = "Something worng data is not deleted, try again.";
      return $this->mgs;
    } else{
      $delete = "DELETE FROM $this->table WHERE post_id = '$this->post_id' ";
      $result = $this->db->delete($delete);
      if( $result ){
        $this->mgs[] = "Data is  deleted successfully.";
        return $this->mgs;
      }else{
        $this->mgs[] = "Data is not  deleted successfully.";
        return $this->mgs;
      }
    }
  }



	public function sociallink () {
      $social = "SELECT * FROM sociallink";

      $result = $this -> db -> select ( $social );

      return $result;
	}
}
