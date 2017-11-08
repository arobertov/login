<?php /** @var \App\Data\UserDTO $data */ ?>

<h1> Welcome <?= $data->getUsername() ?> you can edit your profile ! </h1>

<form method="post" action="profile.php">
	<div>
		<label>
			Username:
			<input type="text" name="username" value="<?=$data->getUsername() ?>"/>
		</label>
	</div>
	<div>
		<label>
			Password:
			<input type="text" name="password"/>
		</label>
	</div>
	<div>
		<label>
			First Name:
			<input type="text" name="firstName" value="<?=$data->getFirstName() ?>"/>
		</label>
	</div>
	<div>
		<label>
			Last Name:
			<input type="text" name="lastName" value="<?=$data->getLastName() ?>"/>
		</label>
	</div>
    <label>
        Born On:
        <input type="text" name="bornOn" value="<?=$data->getBornOn() ?>">
    </label>
	<div>
		<input type="submit" name="edit" value=" Edit ">
	</div>
</form>

<p>You can <a href="logout.php">logout</a> and view <a href="allUsers.php">all users</a></p>