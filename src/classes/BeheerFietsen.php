<?php 
    class BeheerFietsen
    {
        function __construct()
        {
            $this->fietsImg = isset($_FILES['fietsImage']) ? $_FILES['fietsImage'] : null;
            $this->fietsTitle = isset($_POST['fietsTitle']) ? $_POST['fietsTitle'] : null;
            $this->fietsDescription = isset($_POST['fietsDescription']) ? $_POST['fietsDescription'] : null;
            $this->fietsColor = isset($_POST['bikeColor']) ? $_POST['bikeColor'] : null;
            $this->fietsFrame = isset($_POST['bikeFrame']) ? $_POST['bikeFrame'] : null;
            $this->fietsWheel = isset($_POST['bikeWheel']) ? $_POST['bikeWheel'] : null;
            $this->fietsPrice = isset($_POST['fietsPrice']) ? $_POST['fietsPrice'] : null;
            $this->fietsElectric = isset($_POST['bikeElectric']) ? $_POST['bikeElectric'] : null;
        }

        public function addFiets()
        {
            $db = new Database();
            if(!$this->fietsImg || !$this->fietsTitle || !$this->fietsDescription || !$this->fietsColor || !$this->fietsPrice) return "input-not-filled";
            $uploadFile = $this->saveImage();
            if($uploadFile === "file-not-allowed") return "file-not-allowed";
            
            $query = $db->db_insertData("INSERT INTO product (product_title, product_type, product_description, product_image, product_price, product_color, product_frame, product_wheel, product_electric) VALUES ('$this->fietsTitle', 'Fiets', '$this->fietsDescription', '$uploadFile', '$this->fietsPrice', '$this->fietsColor', '$this->productFrame', '$this->productWheel', '$this->productElectric')");
            return "success";
        }

        public function getFietsen()
        {
            $db = new Database();
            $query = $db->db_getData("SELECT * FROM product WHERE product_active = 1");

            if(count($query) < 0) return "no-results";
            return $query;
        }

        public function getFietsenFilter($fiets_kleur, $fiets_frame, $fiets_wiel, $fiets_elektrisch)
        {
            $sqlQuery = $this->fietsFilterQueryBuilder($fiets_kleur, $fiets_frame, $fiets_wiel, $fiets_elektrisch);
            $db = new Database();
            $query = $db->db_getData($sqlQuery);

            if(count($query) < 0) return "no-results";
            return $query;
        }

        private function fietsFilterQueryBuilder($fiets_kleur, $fiets_frame, $fiets_wiel, $fiets_elektrisch)
        {
            return $query = "SELECT * FROM product WHERE product_active = 1" . ($fiets_kleur != "all" ? " AND product_color = '$fiets_kleur' " : "") . ($fiets_frame != "all" ? " AND product_frame = '$fiets_frame' " : "") . ($fiets_wiel != "all" ? " AND product_wheel = '$fiets_wiel' " : "") . ($fiets_elektrisch != "all" ? " AND product_electric = '$fiets_elektrisch' " : "");
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
            if(!$this->fietsTitle || !$this->fietsDescription || !$this->fietsPrice) return "input-not-filled";
            if(!$this->fietsImg['name'])
            {
                $query = $db->db_insertData("UPDATE product SET product_title = '$this->fietsTitle', product_description = '$this->fietsDescription', product_price = '$this->fietsPrice', product_color = '$this->fietsColor', product_frame = '$this->fietsFrame', product_wheel = '$this->fietsWheel', product_electric = '$this->fietsElectric' WHERE product_id = '$product_id'");
            }
            else
            {
                $uploadFile = $this->saveImage();
                if($uploadFile === "file-not-allowed") return "file-not-allowed";
                $query = $db->db_insertData("UPDATE product SET product_title = '$this->fietsTitle', product_description = '$this->fietsDescription', product_image = '$uploadFile', product_price = product_price = '$this->fietsPrice', product_color = '$this->fietsColor', product_frame = '$this->productFrame', product_wheel = '$this->fietsWheel', product_electric = '$this->fietsElectric' WHERE product_id = '$product_id'");
            }
            
            
            return "success";
        }

        public function removeFiets($fiets_id) {
            $db = new Database();
            $query = $db->db_updateData("UPDATE product SET product_active = 0 WHERE product_id = $fiets_id");

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