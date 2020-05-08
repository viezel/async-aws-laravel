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
- http://127.0.0.1:8000/mail
- http://127.0.0.1:8000/cache-add
- http://127.0.0.1:8000/cache-check
- http://127.0.0.1:8000/cache-delete


Have fun
