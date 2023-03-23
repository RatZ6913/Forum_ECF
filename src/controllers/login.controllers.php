<?php
// Si USER est connecté alors, je lui empêche : La Vue Connexion et Inscription
if (!empty($_SESSION['pseudo'])) {
  header('location: ./');
}

const ERROR_CONNECT = "Vos identifiants ou mots de passes sont incorrects";
const ERROR_EMPTY = "Veuillez rentrez vos informations";
const ERROR_PATTERN = "Caractères invalides";

function getViewLogin()
{
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$patternLetterNumbers = '/^[a-zA-Z0-9]+$/';
		$patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

		$input = filter_input_array(INPUT_POST, [
			'pseudo' => FILTER_SANITIZE_SPECIAL_CHARS,
			'password' => FILTER_SANITIZE_SPECIAL_CHARS,
		]);
		$errors['error'] = '';

		$pseudo = $input['pseudo'] ?? '';
		$password = $input["password"] ?? '';

		if (empty($pseudo)) {
			$errors['error'] = ERROR_EMPTY;
		} else if (!preg_match($patternLetterNumbers, $pseudo)) {
			$errors['error'] = ERROR_PATTERN;
		}

		if (empty($password)) {
			$errors['error'] = ERROR_EMPTY;
		} else if (!preg_match($patternPassword, $password)) {
			$errors['error'] = ERROR_PATTERN;
		}

		$user = new User();

		if ($user->checkIfMatchUser($pseudo) == true) {
			$checkPassword = $user->checkIfMatchUser($pseudo)['password'];
			if (password_verify($password, $checkPassword)) {
				$_SESSION = [
					'id_user' => $user->getInfoUser($pseudo)['id_u'],
					'pseudo' => $user->getInfoUser($pseudo)['pseudo'],
					'email' => $user->getInfoUser($pseudo)['email'],
					'avatar' => $user->getInfoUser($pseudo)['avatar']
				];
				header('location: ./');
			}
		}
	}
  require_once('./src/views/formUser/login.view.php');
  require_once('./src/views/templates/main.template.php');
}