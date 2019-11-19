<html>
<head>
<title></title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="summary">
<?php
     $conn = new mysqli('localhost', 'root', '', 'sportstime');
     // Check connection
     $id=$_SESSION['infoid'];;
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }
    $result1 = mysqli_query($conn, "SELECT * FROM footballsummary where matchno=$id ORDER BY ID DESC ");?>
        <table>
            <tr>
                <th>Min</th>
                <th>Detail</th>
            </tr>
    <?php
    if($result1){
        if(mysqli_num_rows($result1)>0){
        while($news1 = mysqli_fetch_assoc($result1)){?>
        <!--print_r($news1);-->
            <tr>
                <td><?php echo $news1['time'];?></td>
                <td><?php echo $news1['summary'];?></td>
            </tr>    
    <?php
    }}}
?>
    </table>
    </div>
    <script type="text/javascript">
        setInterval("my_function();",5000); 
        function my_function(){
      $('#summary').load(location.href + ' #summary');
    }
  </script>
</body>
</html>