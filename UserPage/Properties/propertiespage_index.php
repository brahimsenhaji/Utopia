<h1>Properties</h1>

<div class='filter_form'>
    <h2>Filter</h2>
    <div class="form">
    <span>
      <button name='all_btn' class="all_btn"><i class="fa-solid fa-filter"></i> All</button>
     </span>
    <span>
      <input type='text' name='search_filter' class="search_filter" placeholder="Title">
      <button name='search_btn' class="search_btn">Search</button>
     </span>
     <span>
         <select name="category" class="category-input" id="input">
            <option value="House">House</option>
            <option value="Apartment">Apartment</option>
         </select>
     </span>
     <span>
      <input type='text' name='search_filter' class="created" placeholder="Created time yy-mm-dd">
     </span>
    </div>
</div>
<?php 

    include "../Classes/db_PDS.class.php";
    if(isset($_SESSION['UserId'])){
        $Uid = $_SESSION['UserId'];
        $sql = "SELECT * FROM properties where user_id = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ./Myprofile/Myprofile_index.php?error=sqlstatementfaild");
            exit();
        }

        else{
            //Bind Param
            
            mysqli_stmt_bind_param($stmt, "s", $Uid);

            //Execute the Prepared Statement inside database
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
           echo "<div class='prop_cont'>";
           echo "<div class='prop_head'><span>Title</span> <span>Category</span> <span>Price</span> <span>Created at</span> <span></span> <span></span></div>";

           while ($row = mysqli_fetch_assoc($result)) {
               echo "<form action='./Edite_page.php?propertie={$row['id']}' method='post' class='prop_form'>";
               echo "<span>" . $row['title'] . "</span>";
               echo "<span>" . $row['category'] . "</span>";
               echo "<span>" . $row['price'] . " DH</span>";
               echo "<span>" . $row['created_at'] . "</span>";
               echo "<button class='btn' id='btn_edit' name='btn_edit'><i class='fa-solid fa-pen-to-square'></i> Edit</button>";
               echo "<button class='btn' id='btn_delete' name='btn_delete'><i class='fa-solid fa-trash'></i> Delete</button>";
               echo "</form>";
           }
           echo "</div>";
           
        }
        
    }
?>
