<?php 

include 'config.php';

error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	$name = $_POST['name']; // Get Name from form
	$email = $_POST['email']; // Get Email from form
	$comment = $_POST['comment']; // Get Comment from form

	$sql = "INSERT INTO comments (name, email, comment)
			VALUES ('$name', '$email', '$comment')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<hr width="90%" size=1><form action="post.php?mode=post" method="POST" enctype="multipart/form-data"><input type="hidden" name="thread" value="0"><div id="pb"><table><tr><td class="fl"><b>Name</b></td><td><input type=text name=name size="28"></td></tr>
<tr><td class="fl"><b>E-mail</b></td><td><input type=text name=email size="28"></td></tr>
<tr><td class="fl"><b>Subject</b></td><td><input type=text name=subject size="35"><input type=submit value="Submit"></td></tr>
<tr><td class="fl"><b>Comment</b></td><td><textarea id="com" name=comment cols="48" rows="4" id="ftxa"></textarea></td></tr>
<tr><td class="fl"><b>File</b></td><td><input type=file name=img size="35">[<label><input type=checkbox name="noimage" value="y">No image</label>]</td></tr><tr><td class="fl"><b>Key</b></td><td><input type=password name=key size=8 maxlength=12 ></td></tr>
</table>
			<?php 
			
			$sql = "SELECT * FROM comments";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<h4><?php echo $row['name']; ?></h4>
				<a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
				<p><?php echo $row['comment']; ?></p>
			</div>
			<?php

				}
			}
			
			?>
		</div>
	</div>
</body>
</html>
