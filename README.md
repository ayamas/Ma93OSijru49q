# Generic Codeigniter Site

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



  - Type some Markdown on the left
  - See HTML in the right
  - Magic

Markdown is a lightweight markup language based on the formatting conventions that people naturally use in email.  As [John Gruber] writes on the [Markdown site] [1]:

> The overriding design goal for Markdown's
> formatting syntax is to make it as readable
> as possible. The idea is that a
> Markdown-formatted document should be
> publishable as-is, as plain text, without
> looking like it's been marked up with tags
> or formatting instructions.

This text you see here is *actually* written in Markdown! To get a feel for Markdown's syntax, type some text into the left window and watch the results in the right.

### Version
3.0.2

### Tech

Dillinger uses a number of open source projects to work properly:

* [AngularJS] - HTML enhanced for web apps!
* [Ace Editor] - awesome web-based text editor
* [Marked] - a super fast port of Markdown to JavaScript
* [Twitter Bootstrap] - great UI boilerplate for modern web apps
* [node.js] - evented I/O for the backend
* [Express] - fast node.js network app framework [@tjholowaychuk]
* [Gulp] - the streaming build system
* [keymaster.js] - awesome keyboard handler lib by [@thomasfuchs]
* [jQuery] - duh

### Installation

You need Gulp installed globally:

```sh
$ npm i -g gulp
```

```sh
$ git clone [git-repo-url] dillinger
$ cd dillinger
$ npm i -d
$ mkdir -p public/files/{md,html,pdf}
$ gulp build --prod
$ NODE_ENV=production node app
```

### Plugins

Dillinger is currently extended with the following plugins

* Dropbox
* Github
* Google Drive
* OneDrive

Readmes, how to use them in your own application can be found here:

* plugins/dropbox/README.md
* plugins/github/README.md
* plugins/googledrive/README.md
* plugins/onedrive/README.md

### Development

Want to contribute? Great!

Dillinger uses Gulp + Webpack for fast developing.
Make a change in your file and instantanously see your updates!

Open your favorite Terminal and run these commands.

First Tab:
```sh
$ node app
```

Second Tab:
```sh
$ gulp watch
```

(optional) Third:
```sh
$ karma start
```

### Todo's

 - Write Tests
 - Rethink Github Save
 - Add Code Comments
 - Add Night Mode

License
----

MIT


**Free Software, Hell Yeah!**

[john gruber]:http://daringfireball.net/
[@thomasfuchs]:http://twitter.com/thomasfuchs
[1]:http://daringfireball.net/projects/markdown/
[marked]:https://github.com/chjj/marked
[Ace Editor]:http://ace.ajax.org
[node.js]:http://nodejs.org
[Twitter Bootstrap]:http://twitter.github.com/bootstrap/
[keymaster.js]:https://github.com/madrobby/keymaster
[jQuery]:http://jquery.com
[@tjholowaychuk]:http://twitter.com/tjholowaychuk
[express]:http://expressjs.com
[AngularJS]:http://angularjs.org
[Gulp]:http://gulpjs.com
[Get your own API keys]:http://www.google.com/recaptcha
