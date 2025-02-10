<nav>
    <ul>
        <li><a href="<?= Uri::create('/'); ?>">Home page</a></li>
        <li><a href="<?= Uri::create('about'); ?>">About us</a></li>
        <li><a href="<?= Uri::create('contact'); ?>">Contact</a></li>
        <li>
            <form method="post" action="<?= Uri::create('users/logout'); ?>">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </li>
    </ul>
</nav>
