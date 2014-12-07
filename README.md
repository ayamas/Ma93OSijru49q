# Generic Codeigniter Site
This site is using Codeigniter 2.2.0. Since Ellislab is handing over the development to another party, most likely Codeigniter 3.0 will be in stable version in near time. We will update to current version of Codeigniter once it is in stable version.

## Installation
##### /application/config/config.php<br><br>
Update the 'base_url' to CodeIgniters root installation directory.
```sh
$config['base_url'] = 'http://localhost/your_codeigniter_directory/';
```

Update the 'encryption_key' config setting to a value of your choice.
```sh
$config['encryption_key'] = 'YOUR_ENCRYPTION_KEY';
```

Update the 'sess_cookie_name' config setting to a value of your choice. 
```sh
$config['sess_cookie_name'] = 'your_session';
```

Update the 'cookie_prefix' config setting to a value of your choice. This is to avoid collisions.
```sh
$config['cookie_prefix'] = "your_prefix_";
```
##### /application/config/database.php<br><br>
Update the database setting
```sh
$db['default']['username'] = 'db_username';
$db['default']['password'] = 'db_password';
$db['default']['database'] = 'db_name';
```

##### /application/config/flexi_auth.php<br><br>
Static Salt for Password Hashing. It is very important that BEFORE you insert any users into the database, that you change the libraries static salt to your own unique value.Once you start inserting users to the database, their password will have been hashed using this salt, therefore it cannot be later changed without reseting everyones passwords.
```sh
$config['security']['static_salt'] = 'change-me!';
```

Google reCAPTCHA. [Get your own API keys] in order to use the service. Once you have obtained your keys, update the flexi auth libraries config file as follows.
```sh
$config['security']['recaptcha_public_key'] = 'ENTER_RECAPTCHA_PUBLIC_KEY_HERE';
$config['security']['recaptcha_private_key'] = 'ENTER_RECAPTCHA_PRIVATE_KEY_HERE'; 
```


##### .htaccess<br><br>
Change the path of the files 'RewriteBase /' to your servers Codeigniter installation. 
```sh
RewriteBase /your_codeigniter_directory/
```

##### SQL Dump<br><br>
Import Generic.Site.sql to your database.

## Usage
##### Registration<br><br>
Register new user. There is no default user since the each installation require a different static salt key. THIS USER WILL BE ADMIN to your site. Please use valid credential as the account has to be validated first before you can even login.

IMPORTANT!

After successfully create your first user, browse to
```sh
/application/config/flexi_auth.php
```
and change '3' to '1'. This is to prevent next user to have an admin authority.
```sh
$config['settings']['default_group_id'] = 3;
CHANGE TO
$config['settings']['default_group_id'] = 1;
```

##### Layout Template<br><br>
Custom Layout Libraries
```sh
/application/libraries/Layouts.php
```
This will be the main template for the whole application. The default consists of 3 seperate layout (public, member and administrator). If you wish to add a new template, insert the new layout function just like below
```sh
public function newLayoutName($view_name, $params = array(), $layout = 'new_layout') {
        .....
}
```
The default location for view function is located at
```sh
/application/views/layouts
```

##### How to Use Template<br>
##### Controller<br><br>
```sh
// Set the page title
$this->layouts->set_title('Welcome');
        
// Include any css that needed. This is chained method, so just add all file like below
$this->layouts->add_css('assets/css/bootstrap.css')
              ->add_css('assets/css/sb-admin-2.css');
        
// Include any js that needed
$this->layouts->add_js('assets/js/jquery.js')
              ->add_js('assets/js/bootstrap.min.js');

$this->layouts->viewPublic('public/login_view', $this->data);
```
CSS and JS are seperated because it is better to load the js file at the bottom of the page rather than on the top. For each function, user can define which CSS and JS file that get loaded. This modular loading will improve site performance rather than loading all the assest files on every page.

##### View<br><br>
```sh
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Generic Template<?php echo $title_for_layout ?></title> 

        <?php echo $this->layouts->print_css(); ?>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <?php echo $content_for_layout; ?> 

        <?php echo $this->layouts->print_js(); ?> 

    </body>

</html>
```
The view will be called inside 
```sh
<?php echo $content_for_layout; ?> 
```


### Version
1.0.0

### Tech

This generic site uses a number of open source projects to work properly:

* [CodeIgniter] - A Fully Baked PHP Framework!
* [flexi auth] - awesome user authentication library
* [Layout Manager] - Tutorial on how to create Layout Manager
* [SB Admin 2 template] - Strip down free responsive bootstrap admin template
* [jQuery] - duh


### Todo's

 - Nothing yet


**Free Software, Hell Yeah!**

[CodeIgniter]:http://www.codeigniter.com/
[flexi auth]:http://haseydesign.com/flexi-auth/
[Layout Manager]:http://code.tutsplus.com/tutorials/how-to-create-a-layout-manager-with-codeigniter--net-15533
[SB Admin 2 template]:http://startbootstrap.com/template-overviews/sb-admin-2/
[jQuery]:http://jquery.com
[Get your own API keys]:http://www.google.com/recaptcha
