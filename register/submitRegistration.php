<?php
			$pdo->exec([$newName, $newAddress, $newPhone, $newEmail, $newNin]);
			$sql2 = "INSERT INTO users (role, username, password, user_id) 