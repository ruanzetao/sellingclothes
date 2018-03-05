<?php 
if(isset($Account)){
	?>
	<a class="dropdown-toggle" data-toggle="dropdown"><img src="{!! url('/public/images') !!}/<?php if(isset($Account['image'])) echo $Account['image']; ?>" class="user-image-home" alt="User Image"><b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li id="btnProfile" data-account="<?php echo $Account['id'] ?>"><a>Profile</a></li>
		<li id="btnLogout"><a>Logout</a></li>
	</ul>
	<?php
}
?>
