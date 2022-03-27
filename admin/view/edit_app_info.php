<section id="web-info">
    <h1>Web info</h1>
    <form action="controller.php?from_form=edit_app_info" method="post">
        <div>
            <label for="name">App Name</label>
            <input type="text" id="name" name="name" value="<?=$APP["name"]?>">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="<?=$APP["description"]?>">
        </div>
        <div>
            <label for="home-url">Home URL</label>
            <input type="text" id="home-url" name="home-url" value="<?=$APP["home-url"]?>">
        </div>
        <h4>Database Info (READ ONLY)</h4>
        <div>
            <label for="database">Database</label>
            <input type="text" id="database" name="database" value="<?=$APP["database-connection-info"]["database"]?>" readonly>
        </div>
        <div>
            <label for="hostname">Host Name</label>
            <input type="text" id="hostname" name="hostname" value="<?=$APP["database-connection-info"]["hostname"]?>" readonly>
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?=$APP["database-connection-info"]["username"]?>" readonly>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?=$APP["database-connection-info"]["password"]?>" readonly>
        </div>
        <input type="submit" value="Save">
    </form>
</section>