<?php /** @var \App\Data\ErrorDTO $data  */ ?>

<h1>Oops, an error occurred !</h1>

<h3><?=$data->getErrorInfo(); ?></h3>

<p><a href="index.php">Go back >>></a></p>