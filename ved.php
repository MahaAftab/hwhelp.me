<?php
require('include/config.php');
?>
<?php
$query1 = mysqli_query($con, "select * from vedio where courseid='11'");
while ($qry1 = mysqli_fetch_assoc($query1)) {
    $vid = $qry1["vedio"];
}
?>

<video width="100%" controls>
    <source src="<?php echo $vid ?>;" type="video/mp4">
</video>
<br>
<button onclick="slowPlaySpeed()" type="button"><img src="../user/img/download.jpg" title="Slow Play" height="30px"></button>
<button style="margin-left:45px" onclick="nrmlPlaySpeed()" type="button"> play normal</button>
<button style="margin-left:45px" onclick="fastPlaySpeed()" type="button"><img src="../user/img/arrowRight.gif" title="Fast Play" height="30px"></button>

<script>
    var vid = document.getElementById("myVideo");

    function slowPlaySpeed() {
        vid.playbackRate = 0.3;
    }
    function nrmlPlaySpeed() {
        vid.playbackRate = 1.0;
    }
    function fastPlaySpeed() {
        vid.playbackRate = 5.0;
    }
</script>