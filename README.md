# Test Async AWS Laravel Integration


# How to test

1. checkout repo
2. `composer install`
3. edit `.env` with: your AWS credentials, SES email, redis endpoint, SQS queue name and account id on sqs prefix
4. run `php artisan serve`
5. open `routes/web.php` to see the test routes:

- http://127.0.0.1:8000/file-upload
- http://127.0.0.1:8000/file-exists
- http://127.0.0.1:8000/file-delete
- http://127.0.0.1:8000/queue
- http://127.0.0.1:8000/mail
- http://127.0.0.1:8000/cache-add
- http://127.0.0.1:8000/cache-check
- http://127.0.0.1:8000/cache-delete


Have fun

## How to test a PR. 

- Clone the source of https://github.com/async-aws/aws into /workplace/aws
- Check out the fork/pr
- Clone this repo into /workplace/laravel-test
- `cd /workplace/laravel-test`
- `composer install`
- `/workplace/aws/link`
- You have now created symlinks for the vendor folder. 

```
> /workplace/aws/link
"async-aws/s3" has been linked to "/workplace/aws/src/Service/S3".
"async-aws/illuminate-filesystem" has been linked to "/workplace/aws/src/Integration/Laravel/Filesystem".
"async-aws/core" has been linked to "/workplace/aws/src/./Core".
"async-aws/illuminate-queue" has been linked to "/workplace/aws/src/Integration/Laravel/Queue".
"async-aws/sqs" has been linked to "/workplace/aws/src/Service/Sqs".
"async-aws/flysystem-s3" has been linked to "/workplace/aws/src/Integration/Flysystem/S3".
"async-aws/illuminate-mail" has been linked to "/workplace/aws/src/Integration/Laravel/Mail".
"async-aws/ses" has been linked to "/workplace/aws/src/Service/Ses".
```
