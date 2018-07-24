<?php

use common\Router;

/**
 * @var string $active
 * @var string $title
 * @var string $content
 */

?>
<form class="form-signin" action="/<?= Router::getInstance()->getRoutMarker() ?>/index/auth" method="post">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputLogin" class="sr-only">Login</label>
    <input type="text" name="login" id="inputLogin" class="form-control border-input" placeholder="Login" required
           autofocus>
    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control border-input" placeholder="Password"
           required>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>