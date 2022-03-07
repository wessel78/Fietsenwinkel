<?php 
    class BeheerFietsen
    {
        function __construct()
        {
            $this->fietsImg = isset($_FILES['fietsImage']) ? $_FILES['fietsImage'] : null;
            $this->fietsTitle = isset($_POST['fietsTitle']) ? $_POST['fietsTitle'] : null;
            $this->fietsDescription = isset($_POST['fietsDescription']) ? $_POST['fietsDescription'] : null;
            $this->fietsColor = isset($_POST['fietsColor']) ? $_POST['fietsColor'] : null;
            $this->fietsPrice = isset($_POST['fietsPrice']) ? $_POST['fietsPrice'] : null;
        }

        public function addFiets()
        {
            $db = new Database();
            if(!$this->fietsImg || !$this->fietsTitle || !$this->fietsDescription || !$this->fietsColor || !$this->fietsPrice) return "input-not-filled";
            $uploadFile = $this->saveImage();
            if($uploadFile === "file-not-allowed") return "file-not-allowed";
            
            $query = $db->db_insertData("INSERT INTO product (product_title, product_type, product_description, product_image, product_price, product_color) VALUES ('$this->fietsTitle', 'Fiets', '$this->fietsDescription', '$uploadFile', '$this->fietsPrice', '$this->fietsColor')");
            return "success";
        }

        public function getFietsen()
        {
            $db = new Database();
            $query = $db->db_getData("SELECT * FROM product WHERE product_active = 1");

            if(count($query) < 0) return "no-results";
            return $query;
        }

        public function getFietsenEdit($product_id)
        {
            $db = new Database();
            $query = $db->db_getData("SELECT * FROM product WHERE product_id = $product_id");
            if(count($query) < 0) return "no-results";
            return $query;
        }

        public function editFiets($product_id)
        {
            $db = new Database();
            if(!$this->fietsTitle || !$this->fietsDescription || !$this->fietsColor || !$this->fietsPrice) return "input-not-filled";
            if(!$this->fietsImg['name'])
            {
                $query = $db->db_insertData("UPDATE product SET product_title = '$this->fietsTitle', product_description = '$this->fietsDescription', product_price = '$this->fietsPrice', product_color = '$this->fietsColor' WHERE product_id = '$product_id'");
            }
            else
            {
                $uploadFile = $this->saveImage();
                if($uploadFile === "file-not-allowed") return "file-not-allowed";
                $query = $db->db_insertData("UPDATE product SET product_title = '$this->fietsTitle', product_description = '$this->fietsDescription', product_image = '$uploadFile', product_price = '$this->fietsPrice', product_color = '$this->fietsColor' WHERE product_id = '$product_id'");
            }
            
            
            return "success";
        }

        private function saveImage()
        {
            $allow = array("jpg", "jpeg", "png");
            $fileName = $this->fietsImg['name'];
            $file_info = explode('.', strtolower($this->fietsImg['name']));
            $file_extention = end($file_info);

            if(!in_array(end($file_info), $allow)) return "file-not-allowed";
            $file_name = sha1($fileName) . "." . $file_extention;
            move_uploaded_file($this->fietsImg['tmp_name'], "../../public/img/fiets_img/" . $file_name);
            
            return $file_name;
        }
    }
?>