rename .env.example file to .env

`composer install`  
`php artisan key:generate`  
`php artisan cache:clear`  
`php artisan view:clear`

import database from **database/dump/kolos.sql**

set email on server  
set **APP_URL**, configs for connecting with database and email in **.env** file  
set cron on server  
`* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`

Admin panel: /admin  
**email:** admin@mail.com
**password:** admin123