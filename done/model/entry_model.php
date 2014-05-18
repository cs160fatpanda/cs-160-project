<?php

	static $length_bool = true;
	$start_bool = true;
	$course_bool = true;
	$category_bool = true;
	
	class entry_model
	{
	/** 
	make connection to database
	*/
		
		
		
		
		
		public function searchResultQuery($query, $start, $end)
		{
			$con=mysqli_connect("localhost", "sjsucsor_s2g314s", "fatpanda14","sjsucsor_160s2g32014s");
			if (mysqli_connect_errno($con))
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$i = 0;
			$array2 = [];
    			
       			 $query = htmlspecialchars($query); //converts special characters
		
        		$raw_results = mysqli_query($con,"SELECT round(avg(Rating_Review.rating), 1) as rating, course_data.*,coursedetails.profname,coursedetails.profimage 
				FROM course_data,coursedetails,Rating_Review
            			WHERE ((`title` LIKE '%".$query."%') 
				OR (`profname` LIKE '%".$query."%')
				OR (`site` LIKE '%".$query."%'))
				AND course_data.id = coursedetails.course_id
				AND course_data.id = Rating_Review.course_id
				group by course_data.id			
				");
		
			if($raw_results)
		{
           		while($row = mysqli_fetch_array($raw_results))
	  		{
			$array2[$i] = array("rating" => $row['rating'],"id" => $row['id'],"course_image" => $row['course_image'], "title" => $row['title'], "course_link" => $row['course_link'],
			"short_desc" => $row['short_desc'], "category" => $row['category'], "date" => $row['start_date'], 
			"course_length" => $row['course_length'], "site" => $row['site'],"profname" => $row['profname'],"profimage" => $row['profimage']);
			$i++;
			}
		}
		
		
		return $array2;
		
		}
		
		

		public function course_order($orderby,$query, $start, $end)
		{
			$con=mysqli_connect("localhost","sjsucsor_s2g314s", "fatpanda14","sjsucsor_160s2g32014s");
			if (mysqli_connect_errno($con))
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		
			global $length_bool;
		
		 $query = htmlspecialchars($query);

			//get the scraped data from database
		if($orderby == "course_length")
		{		
			if($length_bool === true)
			{
				$result=mysqli_query($con,"SELECT round(avg(Rating_Review.rating), 1) as rating, course_data.*,coursedetails.profname,coursedetails.profimage
				FROM course_data,coursedetails,Rating_Review
            			WHERE ((`title` LIKE '%".$query."%') 
				OR (`profname` LIKE '%".$query."%')
				OR (`site` LIKE '%".$query."%'))
				AND course_data.id = coursedetails.course_id
				AND course_data.id = Rating_Review.course_id
				group by course_data.id
				ORDER BY course_length desc;");
				$length_bool = true;
			}
			else
			{
				$result=mysqli_query($con,"SELECT round(avg(Rating_Review.rating), 1) as rating, course_data.*,coursedetails.profname,coursedetails.profimage
				FROM course_data,coursedetails,Rating_Review
            			WHERE ((`title` LIKE '%".$query."%') 
				OR (`profname` LIKE '%".$query."%')
				OR (`site` LIKE '%".$query."%'))
				AND course_data.id = coursedetails.course_id
				AND course_data.id = Rating_Review.course_id
				group by course_data.id
				ORDER BY course_length asc;");
				$length_bool = false;
			}
		}
		elseif($orderby == "start")
		{
			$result=mysqli_query($con,"SELECT round(avg(Rating_Review.rating), 1) as rating, course_data.*,coursedetails.profname,coursedetails.profimage
				FROM course_data,coursedetails,Rating_Review
            			WHERE ((`title` LIKE '%".$query."%') 
				OR (`profname` LIKE '%".$query."%')
				OR (`site` LIKE '%".$query."%'))
				AND course_data.id = coursedetails.course_id
				AND course_data.id = Rating_Review.course_id
				group by course_data.id	
				ORDER BY start_date desc;");
		}
		elseif($orderby == "course_name")
		{
			$result=mysqli_query($con,"SELECT round(avg(Rating_Review.rating), 1) as rating, course_data.*,coursedetails.profname,coursedetails.profimage
				FROM course_data,coursedetails,Rating_Review
            			WHERE ((`title` LIKE '%".$query."%') 
				OR (`profname` LIKE '%".$query."%')
				OR (`site` LIKE '%".$query."%'))
				AND course_data.id = coursedetails.course_id
				AND course_data.id = Rating_Review.course_id
				group by course_data.id
				ORDER BY title asc;");
		}
		elseif($orderby == "category")
		{
			$result=mysqli_query($con,"SELECT round(avg(Rating_Review.rating), 1) as rating, course_data.*,coursedetails.profname,coursedetails.profimage
				FROM course_data,coursedetails,Rating_Review
            			WHERE ((`title` LIKE '%".$query."%') 
				OR (`profname` LIKE '%".$query."%')
				OR (`site` LIKE '%".$query."%'))
				AND course_data.id = coursedetails.course_id
				AND course_data.id = Rating_Review.course_id
				group by course_data.id
				ORDER BY category asc;");
		}
		$i = 0;
		$array = [];
		if($result)
		{
           		while($row = mysqli_fetch_array($result))
	  		{
			$array[$i] = array("rating" => $row['rating'],"id" => $row['id'],"course_image" => $row['course_image'], "title" => $row['title'], "course_link" => $row['course_link'],
			"short_desc" => $row['short_desc'], "category" => $row['category'], "date" => $row['start_date'], 
			"course_length" => $row['course_length'], "site" => $row['site'],"profname" => $row['profname'],"profimage" => $row['profimage']);
			$i++;
			}
		}
		return $array;
		}

		public function setRating($courseID,$rate)
		{
			$con=mysqli_connect("localhost","sjsucsor_s2g314s", "fatpanda14","sjsucsor_160s2g32014s");
			if (mysqli_connect_errno($con))
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
	session_start();
			echo $username = $_SESSION['username'];
			echo $courseID=(int)$courseID;
			$result=mysqli_query($con,"Select id From members Where username='$username'");
			$uID = "";
			if($result)
			{
           		while($row = mysqli_fetch_array($result))
	  		{
				$uID = $row['id'];
			}
			}
			
	
			$sql2 = "INSERT INTO Rating_Review VALUES ('$uID','$courseID','$rate',' ')";

				if (!mysqli_query($con,$sql2))
				  {
				  echo ('errrrrrr: ' . mysqli_error($con));
		
				  }
	
	

			
		}
		
		public function insert_user($username,$password,$fname,$lname,$email)
		{
			$con=mysqli_connect("localhost","sjsucsor_s2g314s", "fatpanda14","sjsucsor_160s2g32014s");
			if (mysqli_connect_errno($con))
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		
			$sql = "INSERT INTO members VALUES ('0','$username','$password', '$fname','$lname','$email')";

			if (!mysqli_query($con,$sql))
			  {
			  echo ('Error: ' . mysqli_error($con));
		
			  }
			  }

	

	}
?>
