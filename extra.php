<?php require_once 'header.php';?>
    <title>team>_player</title>
</head>
<body>
<?php
     $conn = new mysqli('localhost', 'root', '', 'sportstime');
     // Check connection
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }
    $result1 = mysqli_query($conn, "SELECT * FROM footballsummary where matchno=$id");?>
    <div class="wrap_table">
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
    <?php require_once 'footer.php';?>