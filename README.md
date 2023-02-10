# Larablog 💻

## About the project

Larablog is a blog where the users are able to post articles and see other articles posted by other users!

Larablog is a blog that the main purpose is the users beign able to communicate with each others by using articles

## 🕹️ Main Features 

  * This is a blog, so, the users can see, post, edit and delete articles.
s
  * The user is able to see a dashboard where will be shown how many articles, categories and tags the user has. The user will be able to see a chart as well, that shows how many articles the user have been posted through the week.

## ⚙️ Installation and set up 

### First, clone this repository!

```
$ git clone https://github.com/IBernardo-Rodrigues/larablog.git
```

### Composer, key and storage link!

Run the composer install
```
$ composer install
```
Then, generate a key for your project
```
$ php artisan key:generate
```
Now, you need to link the storage folder
```
$ php artisan storage:link
```

### Then, edit your ".env.example" file!

Config the ".env.example" to match your database and then rename to ".env"!

### Run the migrations

<hr>

Now you can run the project in your browser!

