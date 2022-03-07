<?php 
    class Review 
    {
        public function __construct()
        {
            $this->review_title = isset($_POST['reviewTitle']) ? $_POST['reviewTitle'] : null;
            $this->review_body = isset($_POST['reviewBody']) ? $_POST['reviewBody'] : null;
        }

        public function placeReview()
        {
            if(!$this->review_title && !$this->review_body) return "empty-input";
            $db = new Database;
            $user_id = $_SESSION['user_id'];
            $db->db_insertData("INSERT INTO review (review_title, review_body, review_user_id, review_date) VALUES ('$this->review_title', '$this->review_body', '$user_id', NOW())");
            return "success";
        }

        public function getReview()
        {
            $db = new Database;
            $get_reviews = $db->db_getData("SELECT r.review_id, r.review_title, r.review_body, CONCAT(users.firstname, ' ' , users.lastname) AS 'user_name', r.review_date FROM review r INNER JOIN users ON (r.review_user_id = users.user_id) WHERE review_active = 1");
            return $get_reviews;
        }

        public function removeReview($review_id)
        {
            $db = new Database;
            $remove_review = $db->db_updateData("UPDATE review set review_active = 0 WHERE review_id = $review_id");
            return "success";
        }
    }
?>

