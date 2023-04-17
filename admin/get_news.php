<?php
include('includes/config.php');
if(!empty($_POST["catid"]))
{
    $id=intval($_POST['catid']);
    $query=mysqli_query($con,"SELECT * FROM tblposts WHERE CategoryId=$id");
    ?>
    <option value="">Seleccionar noticia</option>
    <?php
    while($row=mysqli_fetch_array($query))
    {
        ?>
        <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['PostTitle']); ?></option>
        <?php
    }
}
?>