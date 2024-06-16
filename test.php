<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP MySQL Ajax Live Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>
<body>
<?php
include("config/dbcon.php");
?>
<div class="container mt-4">
    <div class="input-group mb-4 mt-3">
         <div class="form-outline">
            <input type="text" id="getQuery" placeholder="ค้นหา" class="form-control"/>
        </div>
    </div>                   
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>No</th>
          </tr>
        </thead>
        <tbody id="showdata">
          <?php  
                $sql = "SELECT * FROM users";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($query))
                {
                  echo "<tr>";
                   echo "<td><h6>".$row['date']."</h6></td>";
                   echo "<td><h6>".$row['round_no']."</h6></td>";
                  echo "</tr>";   
                }
            ?>
        </tbody>
    </table>
</div>
<script>
  $(document).ready(function(){
   $('#getQuery').on("keyup", function(){
     var query = $(this).val();
     $.ajax({
       method: 'POST',
       url: 'searchajax.php',
       data: {query: query},
       success: function(response) {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>
</body>
</html>
