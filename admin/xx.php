<form action="#" method="post">
<input type="checkbox" name="gender" value="Male">Male</input>
<input type="checkbox" name="gender" value="Female">Female</input>
<input type="submit" name="submit" value="Submit"/>
</form>
<?php
if (isset($_POST['gender'])){
echo $_POST['gender']; // Displays value of checked checkbox.
}
?>