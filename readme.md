
# MQ Blog

This Blog build with Laravel 5.6 + VueJs 2.0

## Basic Features

- Manage articles and media
- Statistical tables
- Categorize articles
- Label classification
- Content moderation
- ベトナム語　＋　日本語 
- Markdown Editor
- and more...

## Server Requirements

- PHP >= 7.1.0
- Node >= 6.x
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- MySql 5.7+

## Preview

![New Blog](https://pigjian.com/uploads/post_img/2016-12-27/newblog1.jpeg)

![New Blog](https://pigjian.com/uploads/post_img/2016-12-27/newblog2.jpeg)

## How to Install?

### 1. Clone the source code or create new project.

```shell
git clone https://github.com/minhquang4334/blog.git
```



### 2. Set the basic config

```shell
cp .env.example .env
```

Edit the `.env` file and set the `database` and other config for the system after you copy the `.env`.example file.

### 2. Install the extended package dependency.

Install the `Laravel` extended repositories: 

```shell
composer install -vvv
```

Install the `Vuejs` extended repositories: 

```shel
npm install
```

Compile the js code: 

```shel
npm run dev

// OR

npm run watch

// OR

npm run production
```

### 3. Run the blog install command, the command will run the `migrate` command and generate test data.

```shell
php artisan blog:install
```

## Thanks

- [Jiajian Chan](http://github.com/jcc)
