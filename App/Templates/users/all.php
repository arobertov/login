<?php /** @var \App\Data\UserDTO[] $data */ ?>

<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Names</th>
			<th>Born On</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $user): ?>
	       <tr>
		       <td><?=$user->getId() ?></td>
		       <td><?=$user->getUsername() ?></td>
		       <td><?=$user->getFirstName() ?> <?=$user->getLastName() ?></td>
		       <td><?=$user->getBornOn() ?></td>
	       </tr>
		<?php endforeach; ?>
	</tbody>
</table>

<p>Go back to <a href="profile.php">your profile</a></p>
