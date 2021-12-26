<?php
    require_once("../../../vendor/autoload.php");

    use Respect\Validation\Validator as v;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $errors = [];
        if (!v::notBlank()->alnum(' ')->validate($name)) {
            $errors[] = "name";
        }
        if (!v::email()->validate($email)) {
            $errors[] = "email";
        }
        if (!v::alnum('!','@','#','$','%','^','&','*','?','_','~','-','(',')')->length(8, null)->validate($password)) {
            $errors[] = "password";
        }
        if (!empty($errors)) {
            throw new \Exception();
        }

        $user = new App\Model\User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $controller = new App\Controller\UserController();
        $controller->insert($user);
    } catch (\Exception $e) {
        session_start();
        $_SESSION['errors'][] = [$errors, 2];
    } finally {
        $host = $_SERVER['HTTP_HOST'];
        header("Location: http://$host/SignUp/index.php");
    }